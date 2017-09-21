<? namespace ScriptEd;

class Info {
  # These correspond to unique identifiers for acf-json fields
  # They're needed here to safely, programmatically update ACF fields
  public static $field_keys = [
    'give_email' => 'field_53c78208a5d3e',
    'give_amount' => 'field_53c780f0a5d3d',
    'give_zip' => 'field_53c8c6ade6597',
    'recurring' => 'field_561982a1297e0',
    'customer_id' => 'field_561984bd297e2',
    'subscription_id' => 'field_5619981e0cdee',
    'subscription_status' => 'field_561997d9297e3',
    'plan_id' => 'field_56401ada79cf2',
    'next_payment' => 'field_5647c1f7e1cfc',
    'canceled_at' => 'field_56482cfa3c79e',
    'source_id' => 'field_5722ae0337bb4'
  ];

  public static function field_key ($key) {
    if ( isset(static::$field_keys[$key]) ) {
      return static::$field_keys[$key];
    } else {
      return false;
    }
  }
}
