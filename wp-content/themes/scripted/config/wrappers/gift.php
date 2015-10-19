<? namespace ScriptEd;

class Gift {
  public static function create() {}

  public static function send_confirmation($gift) {
    try {
      $mandrill = new \Mandrill(SE_MANDRILL_API_KEY);
      $template = 'gift-confirmation';
      $fields = get_fields($gift);
      $content = [
        ['name' => get_the_title($gift)],
        ['amount' => $fields['amount']],
        ['confirmation_url' => get_permalink($gift)],
        ['date' => get_the_date('F d, Y', $gift)]
      ];
      
      $message = [
        'template_name' => $template, 
        'template_content' => $content,
        'to' => [
          [
            'email' => $fields['email'],
            'name' => get_the_title($gift)
          ]
        ],
        'metadata' => [
          'amount' => $fields['amount']
        ],
        'global_merge_vars' => [
          [
            'name' => 'confirmation_url',
            'content' => get_permalink($gift)
          ],
          [
            'name' => 'amount',
            'content' => $fields['amount']
          ],
          [
            'name' => 'donor_name',
            'content' => get_the_title($gift)
          ],
          [
            'name' => 'date',
            'content' => get_the_date('F d, Y', $gift)
          ]
        ]
      ];

      return $mandrill->messages->sendTemplate($template, $content, $message);

    } catch(Mandrill_Error $e) {
      return $e;
    }
  }
}
