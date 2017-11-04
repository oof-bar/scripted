<? namespace ScriptEd;

class Util {
  public static function dump ($obj) {
    echo '<pre>';
    var_dump($obj);
    echo '</pre>';
  }

  public static function console ($obj) {
    echo '<script>console.log(';
    echo json_encode($obj);
    echo ');</script>';
  }

  public static function intoGroups ($arr, $num = 1) {
    $len = count($arr);
    $groupSize = ceil($len / $num);

    return array_chunk($arr, $groupSize);
  }
}
