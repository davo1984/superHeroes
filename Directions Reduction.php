function dirReduc($arr) {
    $prev = '';
    $out = [];
    foreach( $arr as $next ) {
      $next = strtolower ($next);
      echo $next, '<-next '.PHP_EOL;
      if ( $prev != '' ) { 
        $prev = $next;
        echo 'prev set to next>', $prev, PHP_EOL;
      } elseif (  ($prev == 'north' and $next == 'south')
              or  ($prev == 'south' and $next == 'north')
              or  ($prev == 'east'  and $next == 'west')
              or  ($prev == 'west'  and $next == 'east') ) {
        $prev = '';
        echo $prev, 'cancels', $next, PHP_EOL;
      } else { 
        echo 'next>', $next, '< prev >', $prev, PHP_EOL;
        $out[] = $prev;
        echo 'pushed ', $prev, 'onto out'.PHP_EOL;
        $prev = $next;
      }
    }
  echo 'FINISHED';
  print_r ($out);
  return $out;   
}