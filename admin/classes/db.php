<?php


class DB 
{
   public static function found($table){
        $array = ['users' => 'users', 'posts' => 'posts','categories'=>'categories'];

        if ($table == array_search($table, $array)) {
            $found = array_search($table, $array);
            // $res = compact("found");
            // var_dump($res);
            // return $found;
            switch ($found) {
                case 'users':
                 $users = ['username', 'email'];

                    return $users;
                    break;
                
                    case 'posts':
                 $posts = ['category_id','title', 'date','image', 'body'];

                    return $posts;
                    break;
                    case 'categories':
                 $categories = ['name'];

                    return $categories;
                    break;
                
                
            }
        }
   }


    public static function find_by_query($sql){
        global $db;
        $mysqli = new mysqli();
        $result = mysqli_query($db,$sql);
        if(!$result){
            die('Error in Find By Query Method '.$mysqli->error);
            // var_dump($result);

        }else {
            return $result;
        }
    }

    public static function find_by_id($table,$id){
        global $db;
        $sql = "SELECT * FROM ".$table. " WHERE id={$id}";
        $result = self::find_by_query($sql);
        $row = $result->fetch_object();
        return $row;
    }

    public static function find_all($table){
        $sql = "SELECT * FROM ".$table;
        $result = self::find_by_query($sql);
        return $result;
    }


    public function create($table, $input){
        global $db;
        $sql = "INSERT INTO ".$table. "(". implode(',', self::found($table) ) ." )". " VALUES('". implode("','",$input) ."')";
        // var_dump($sql);

        $store = mysqli_query($db,$sql);
        if(!$store){
            echo mysqli_error($db);
        }
    }

    public static function update($table, $input,$id){
    global $db;
        $key = self::found($table);
        $combine = array_combine($key, $input);

      $sql = "UPDATE ".$table. " SET ";
      foreach($combine as $com => $val){
          $sql.= $com."='".$val."',";
      }

      $trim =rtrim($sql,",");
      $trim.=" WHERE id=$id";
      $res = mysqli_query($db,$trim);

        if (!$res) {
            echo mysqli_error($db);
        }else{
            
        }
    // var_dump($trim);
    }

    public function delete($table, $id){
    global $db;
    $sql = "DELETE FROM ".$table. " WHERE id={$id}";
    $delete = mysqli_query($db,$sql);
        if (!$delete) {
            echo mysqli_error($db);
        }

    }

    public function cascade_delete($table,$id){
        global $db;
            $this->delete($table,$id);
            $sql = "DELETE FROM posts WHERE category_id={$id}";
            $delete = mysqli_query($db, $sql);
            if (!$delete) {
                echo mysqli_error($db);
            }   
        
        
    }


    public static function search($query){
        global $db;
    $sql = "SELECT * FROM posts WHERE title LIKE '{$query}%' ";
        $result = self::find_by_query($sql);
        return $result;
        // var_dump($sql);

    }


}///end Of Class


?>