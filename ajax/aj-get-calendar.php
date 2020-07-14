<?php
include "../php/connection.php";
$is_bissexto = $_POST['is_bissexto'];



$conn = getConnection('calendar');

$current_year = date("Y");
$current_day_of_year = date("z");

    $query = "SELECT * FROM calendar_days WHERE year = '$current_year'";


    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll();

    $sor = sizeof($result);

    $current_date = date("d/m");

    if ((sizeof($result) < 1) && ($current_date == '01/01')) {
        generateCalendar($current_year);
    }




$res = Array();

//$res['res'] = Array();

$res['sizeofResult'] = $sor;
$res['is_bissexto'] = $is_bissexto;
$res['current_date'] = $current_date;

$res['doy'] = $current_day_of_year;

$res['calendar'] = Array();

$res['tbody'] = Array();

$res['tbody']['jan'] = "<tr>";
$res['tbody']['feb'] = "<tr>";
$res['tbody']['mar'] = "<tr>";
$res['tbody']['apr'] = "<tr>";
$res['tbody']['may'] = "<tr>";
$res['tbody']['jun'] = "<tr>";
$res['tbody']['jul'] = "<tr>";
$res['tbody']['aug'] = "<tr>";
$res['tbody']['sep'] = "<tr>";
$res['tbody']['oct'] = "<tr>";
$res['tbody']['nov'] = "<tr>";
$res['tbody']['dec'] = "<tr>";


foreach($result as $value) {

    // TRYING FOR SINGLE-CODE

    $index = 0;

        //$res['calendar']['id'] = $value['id'];
        //$res['calendar']['day'] = $value['day'];
        //$res['calendar']['bg_color'] = $value['bg_color'];
        //$res['calendar']['occurrences_red'] = $value['occurrences_red'];

        array_push($res['calendar'], array(
                "id" => $value['id'],
                "day" => $value["day"],
                "month" => $value["month"],
                "bg_color" => $value["bg_color"],
                "occurrences_red" => $value["occurrences_red"],
                "occurrences_orange" => $value["occurrences_orange"],
                "occurrences_yellow" => $value["occurrences_yellow"],
            ));

        //$res['calendar'][$value['month']][$value['id']] = Array();
        //$res['calendar'][$value['month']][$value['id']]['day'] = $value['day'];
        //$res['calendar'][$value['month']][$value['id']]['bg_color'] = $value['bg_color'];
        //$res['calendar'][$value['month']][$value['id']]['occurrences'] = $value['occurrences_red'];

        if($value['day'] == 1) {

            for($i = 0; $i < $value['week_day']; $i++) {
                // if(sizeof($res.t))
                $res['tbody'][$value['month']].= "<td>  </td>";
            }
        }

        if($value['week_day'] == 7) {
            $res['tbody'][$value['month']].= "<tr><td id='td-$value[id]'> $value[day] </td>";
        } else if($value['week_day'] == 6) {
            $res['tbody'][$value['month']].= "<td id='td-$value[id]'> $value[day] </td></tr>";
        } else {
            $res['tbody'][$value['month']].= "<td id='td-$value[id]'> $value[day] </td>";
        }

        $index++;

    // TRYING FOR SINGLE-CODE END

    // array_push($res['res'], "$value[month]");

    // if($value['month'] == 'jan') {
    //     $res['jan'][$value['id']] = Array();
    //     $res['jan'][$value['id']]['day'] = $value['day'];
    //     $res['jan'][$value['id']]['bg_color'] = $value['bg_color'];
    //     $res['jan'][$value['id']]['occurrences'] = $value['occurrences_red'];

    //     if($value['day'] == 1) {

    //         for($i = 0; $i < $value['week_day']; $i++) {
    //             $res['tbody']['jan'].= "<td>  </td>";
    //         }
    //     }

    //     if($value['week_day'] == 7) {
    //         $res['tbody']['jan'].= "<tr><td id='td-$value[id]'> $value[day] </td>";
    //     } else if($value['week_day'] == 6) {
    //         $res['tbody']['jan'].= "<td id='td-$value[id]'> $value[day] </td></tr>";
    //     } else {
    //         $res['tbody']['jan'].= "<td id='td-$value[id]'> $value[day] </td>";
    //     }

    // } else if($value['month'] == 'feb') {
    //     $res['feb'][$value['id']] = Array();
    //     $res['feb'][$value['id']]['day'] = $value['day'];
    //     $res['feb'][$value['id']]['bg_color'] = $value['bg_color'];
    //     $res['feb'][$value['id']]['occurrences'] = $value['occurrences_red'];

    //     if($value['day'] == 1) {

    //         for($i = 0; $i < $value['week_day']; $i++) {
    //             $res['tbody']['feb'].= "<td>  </td>";
    //         }
    //     }

    //     if($value['week_day'] == 7) {
    //         $res['tbody']['feb'].= "<tr><td id='td-$value[id]'> $value[day] </td>";
    //     } else if($value['week_day'] == 6) {
    //         $res['tbody']['feb'].= "<td id='td-$value[id]'> $value[day] </td></tr>";
    //     } else {
    //         $res['tbody']['feb'].= "<td id='td-$value[id]'> $value[day] </td>";
    //     }
    // }

    // $res['res']['id'] = $value['id'];
    // $res['res']['id']['year'] = $value['year'];
    // $res['res']['id']['month'] = $value['month'];
    // $res['res']['id']['day'] = $value['day'];
    // $res['res']['id']['weekday'] = $value['week_day'];
    // $res['res']['id']['bg_color'] = $value['bg_color'];
    // $res['res']['id']['oc_red'] = $value['occurrences_red'];
    // $res['res']['id']['oc_orange'] = $value['occurrences_orange'];
    // $res['res']['id']['oc_yellow'] = $value['occurrences_yellow'];







    // $tbody.= "<td id='td-$value[id]'> $value[day] </td>";
}

$res['tbody']['jan'] .= '</tr>';
$res['tbody']['feb'] .= '</tr>';

// $res['tbody'] = $tbody;

// $jan['jan'] = Array();
// $res['feb'] = Array();
// $res['mar'] = Array();
// $res['apr'] = Array();
// $res['may'] = Array();
// $res['jun'] = Array();
// $res['jul'] = Array();
// $res['aug'] = Array();
// $res['sep'] = Array();
// $res['oct'] = Array();
// $res['nov'] = Array();
// $res['dec'] = Array();

foreach($res as $key => $value) {
    // array_push($res[$key][$i]['day'], ($i+1));
    // array_push($res[$key][$i]['bg_color'], '#ddd');
    // array_push($res[$key][$i]['occurrences'], 4);


}

for($i = 0; $i < 31; $i++) {
    // array_push($res['jan'], ($i+1));

    // $res['jan'][$i] = Array();

    // $res['jan'][$i]['day'] = ($i+1);
    // $res['jan'][$i]['bg_color'] = '#fc21ed';
    // $res['jan'][$i]['occurrences'] = 8;
}

// for($i = 0; $i < 28; $i++) {
//     array_push($res['feb'], ($i+1));

//     array_push($res['feb'][$i]['day'], ($i+1));
//     array_push($res['feb'][$i]['bg_color'], '#ddd');
//     array_push($res['feb'][$i]['occurrences'], 4);
// }
// if($is_bissexto) {
//     array_push($res['feb'], 29);
// }

// for($i = 0; $i < 31; $i++) {
//     array_push($res['mar'], ($i+1));
// }

// for($i = 0; $i < 30; $i++) {
//     array_push($res['apr'], ($i+1));
// }

// for($i = 0; $i < 31; $i++) {
//     array_push($res['may'], ($i+1));
// }

// for($i = 0; $i < 30; $i++) {
//     array_push($res['jun'], ($i+1));
// }

// for($i = 0; $i < 31; $i++) {
//     array_push($res['jul'], ($i+1));
// }

// for($i = 0; $i < 31; $i++) {
//     array_push($res['aug'], ($i+1));
// }

// for($i = 0; $i < 30; $i++) {
//     array_push($res['sep'], ($i+1));
// }

// for($i = 0; $i < 31; $i++) {
//     array_push($res['oct'], ($i+1));
// }

// for($i = 0; $i < 30; $i++) {
//     array_push($res['nov'], ($i+1));
// }

// for($i = 0; $i < 31; $i++) {
//     array_push($res['dec'], ($i+1));
// }

// array_push($res['days'], '1');
// array_push($res['days'], '2');
// array_push($res['days'], '3');

echo json_encode($res);

function generateCalendar($year) {

    // GENERATION

    // $month = 'jun';
    // $start_day = 23;
    //
    // $conn = getConnection('calendar');
    // for($i = 0; $i < 7; $i++) {
    //
    // $query = "INSERT INTO calendar_days(
    //    year, month, day, week_day, bg_color, occurrences_red, occurrences_orange, occurrences_yellow
    //    )
    //    VALUES(
    //        2020, '$month', ($start_day + $i), ($i + 1), '\#ccc', 0, 0, 0
    //    )";
    //
    //    $stmt = $conn->prepare($query);
    //    $stmt->execute();
    // }

       // GENERATION END

       $day_of_week = date('w');
       // $day_of_week = 1;
       // $previous_day_of_week = $day_of_week;

       $conn = getConnection('calendar');

       // Jan
       for($i = 0; $i < 31; $i++) {
              $query = "INSERT INTO calendar_days(
                  year, month, day, week_day, bg_color, occurrences_red, occurrences_orange, occurrences_yellow
                  )
                  VALUES(
                      $year, 'jan', ($i + 1), $day_of_week, '\#ccc', 0, 0, 0
                  )";

                  $stmt = $conn->prepare($query);
                  $stmt->execute();

                  if($day_of_week < 6) {
                    $day_of_week++;
                  } else {
                    $day_of_week = 0;
                  }
       }

       // Feb
       for($i = 0; $i < $is_bissexto ? 29 : 28; $i++) {
              $query = "INSERT INTO calendar_days(
                  year, month, day, week_day, bg_color, occurrences_red, occurrences_orange, occurrences_yellow
                  )
                  VALUES(
                      $year, 'feb', ($i + 1), $day_of_week, '\#ccc', 0, 0, 0
                  )";

                  $stmt = $conn->prepare($query);
                  $stmt->execute();

                  if($day_of_week < 6) {
                    $day_of_week++;
                  } else {
                    $day_of_week = 0;
                  }
       }

       // Mar
       for($i = 0; $i < 31; $i++) {
              $query = "INSERT INTO calendar_days(
                  year, month, day, week_day, bg_color, occurrences_red, occurrences_orange, occurrences_yellow
                  )
                  VALUES(
                      $year, 'mar', ($i + 1), $day_of_week, '\#ccc', 0, 0, 0
                  )";

                  $stmt = $conn->prepare($query);
                  $stmt->execute();

                  if($day_of_week < 6) {
                    $day_of_week++;
                  } else {
                    $day_of_week = 0;
                  }
       }

       // Apr
       for($i = 0; $i < 30; $i++) {
              $query = "INSERT INTO calendar_days(
                  year, month, day, week_day, bg_color, occurrences_red, occurrences_orange, occurrences_yellow
                  )
                  VALUES(
                      $year, 'apr', ($i + 1), $day_of_week, '\#ccc', 0, 0, 0
                  )";

                  $stmt = $conn->prepare($query);
                  $stmt->execute();

                  if($day_of_week < 6) {
                    $day_of_week++;
                  } else {
                    $day_of_week = 0;
                  }
       }

       // May
       for($i = 0; $i < 31; $i++) {
              $query = "INSERT INTO calendar_days(
                  year, month, day, week_day, bg_color, occurrences_red, occurrences_orange, occurrences_yellow
                  )
                  VALUES(
                      $year, 'may', ($i + 1), $day_of_week, '\#ccc', 0, 0, 0
                  )";

                  $stmt = $conn->prepare($query);
                  $stmt->execute();

                  if($day_of_week < 6) {
                    $day_of_week++;
                  } else {
                    $day_of_week = 0;
                  }
       }

       // Jun
       for($i = 0; $i < 30; $i++) {
              $query = "INSERT INTO calendar_days(
                  year, month, day, week_day, bg_color, occurrences_red, occurrences_orange, occurrences_yellow
                  )
                  VALUES(
                      $year, 'jun', ($i + 1), $day_of_week, '\#ccc', 0, 0, 0
                  )";

                  $stmt = $conn->prepare($query);
                  $stmt->execute();

                  if($day_of_week < 6) {
                    $day_of_week++;
                  } else {
                    $day_of_week = 0;
                  }
       }

       // Jul
       for($i = 0; $i < 31; $i++) {
              $query = "INSERT INTO calendar_days(
                  year, month, day, week_day, bg_color, occurrences_red, occurrences_orange, occurrences_yellow
                  )
                  VALUES(
                      $year, 'jul', ($i + 1), $day_of_week, '\#ccc', 0, 0, 0
                  )";

                  $stmt = $conn->prepare($query);
                  $stmt->execute();

                  if($day_of_week < 6) {
                    $day_of_week++;
                  } else {
                    $day_of_week = 0;
                  }
       }

       // Aug
       for($i = 0; $i < 31; $i++) {
              $query = "INSERT INTO calendar_days(
                  year, month, day, week_day, bg_color, occurrences_red, occurrences_orange, occurrences_yellow
                  )
                  VALUES(
                      $year, 'aug', ($i + 1), $day_of_week, '\#ccc', 0, 0, 0
                  )";

                  $stmt = $conn->prepare($query);
                  $stmt->execute();

                  if($day_of_week < 6) {
                    $day_of_week++;
                  } else {
                    $day_of_week = 0;
                  }
       }

       // Sep
       for($i = 0; $i < 30; $i++) {
              $query = "INSERT INTO calendar_days(
                  year, month, day, week_day, bg_color, occurrences_red, occurrences_orange, occurrences_yellow
                  )
                  VALUES(
                      $year, 'sep', ($i + 1), $day_of_week, '\#ccc', 0, 0, 0
                  )";

                  $stmt = $conn->prepare($query);
                  $stmt->execute();

                  if($day_of_week < 6) {
                    $day_of_week++;
                  } else {
                    $day_of_week = 0;
                  }
       }

       // Oct
       for($i = 0; $i < 31; $i++) {
              $query = "INSERT INTO calendar_days(
                  year, month, day, week_day, bg_color, occurrences_red, occurrences_orange, occurrences_yellow
                  )
                  VALUES(
                      $year, 'oct', ($i + 1), $day_of_week, '\#ccc', 0, 0, 0
                  )";

                  $stmt = $conn->prepare($query);
                  $stmt->execute();

                  if($day_of_week < 6) {
                    $day_of_week++;
                  } else {
                    $day_of_week = 0;
                  }
       }

       // Nov
       for($i = 0; $i < 30; $i++) {
              $query = "INSERT INTO calendar_days(
                  year, month, day, week_day, bg_color, occurrences_red, occurrences_orange, occurrences_yellow
                  )
                  VALUES(
                      $year, 'nov', ($i + 1), $day_of_week, '\#ccc', 0, 0, 0
                  )";

                  $stmt = $conn->prepare($query);
                  $stmt->execute();

                  if($day_of_week < 6) {
                    $day_of_week++;
                  } else {
                    $day_of_week = 0;
                  }
       }

       // Dec
       for($i = 0; $i < 31; $i++) {
              $query = "INSERT INTO calendar_days(
                  year, month, day, week_day, bg_color, occurrences_red, occurrences_orange, occurrences_yellow
                  )
                  VALUES(
                      $year, 'dec', ($i + 1), $day_of_week, '\#ccc', 0, 0, 0
                  )";

                  $stmt = $conn->prepare($query);
                  $stmt->execute();

                  if($day_of_week < 6) {
                    $day_of_week++;
                  } else {
                    $day_of_week = 0;
                  }
       }


}
