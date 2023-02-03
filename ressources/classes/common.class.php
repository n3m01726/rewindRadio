<?php
/*  How to use classes 
    RewindRadio\Class::functionName();
*/

namespace RewindRadio;
use \PDO;
use \PDOException;
class Database {
// Connection variables
  private $host = DBHOST;
  private $username = DBUSER;
  private $password = DBPASSWORD;
  private $database = DBNAME;

  // Connection object
  private ?\PDO $conn = null;

  // Connect to database
  public function connect() {
    try {
      $this->conn = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
      die("Connection failed: " . $e->getMessage());
    }
    return $this->conn;
  }

  public static function is_logged_in(){
    if(isset($_SESSION['logged_in'])){
        return true;
    } else {
        return false;
    }
    }
}

Class Layout {
public static function get_player() {
    echo '
    <div class="wdgt_comingSoon">Artist - Played Song</div>  
        </div>   
        <div class="col-12"> 

        </div>
    ';
} /* close footer function */


  public static function getBrandLogo() {
      echo "<a class='navbar-brand' href='/'>";
      if (LOGO) {
          echo "<img src='" . LOGO_URL . "' width='30' height='24'>";
      } else {
          echo '
          <a href="/" type="button" class="btn btn-dark">
          <span class="badge text-dark" style="background-color:#f19135;">
          <i class="bi bi-headphones m-0"></i></span><span style="text-transform: uppercase;font-weight: bold;"> ' . SITE_NAME . '</span>
        </a>';
      }
  }

public static function socialIcons(string $name, string $url) {
      echo "<li class='ms-4'><a class='link-dark' href=". $url. "><h2><i class='bi bi-". $name ."'></i></h2></a></li>";
  }


/**
 * This function gets the cover image for a given artist and track,
 * and displays the image or a placeholder if the image is not available.
 *
 * @param string $showArtist The name of the artist.
 * @param string $showTrack The name of the track.
 */

  public static function getCoverImage($showArtist, $showTrack, $fileName) {
    // Define the replacements to be made in the file path
    $replacements = [
        "'" => "",
        "." => "",
        "jpg" => ".jpg",
        " & " => " ",
        "/public" => SITE_URL."/public/",
        "'", "&#39;"
    ];

    // Build the file path for the cover image
    $imgPath = 'covers/' .$fileName . '.jpg';
    $imgPath = str_replace(array_keys($replacements), array_values($replacements), $imgPath);
   
    // Check if the cover image file exists
    if (file_exists($imgPath)) {
        // If the file exists, output the image element
        echo "<img src='" . urldecode($imgPath) . "' alt='cover' class='rounded-4 img-cover'>";
    } else {
        // If the file does not exist, build the URL for the Last.fm API request
        $url = "http://ws.audioscrobbler.com/2.0/?method=track.getInfo&api_key=" . LASTFM_APIKEY . "&artist=" . urlencode($showArtist) . "&track=" . urlencode($showTrack) . "";
        $xml = @simplexml_load_file($url);
        // Check if the XML document is not empty and the image element exists
        if (isset($xml->track->album->image[2])) {
            // If the image element exists, output the image element
            echo "<img src='", ((string) $xml->track->album->image[2]), "' alt='cover' class='rounded-4 img-cover'>";
            // Check if the cover image file is empty and readable
            if (is_readable($imgPath) && filesize($imgPath) == 0) {
                // If the file is empty and readable, create the file and save the image
                file_put_contents($imgPath, file_get_contents(((string) $xml->track->album->image[2])));
            }
        } else {
            // If the image element does not exist, output the default "no cover" image
            echo "<img src='covers/no_cover.png' alt='cover' class='rounded-4 img-cover'>";
        }
    }
}
}/* close Layout class */

class Text {

  public static function cutText($text, $lg_max) {
      if (mb_strlen($text) > $lg_max) {
          $text = mb_substr($text, 0, $lg_max);
          $last_space = mb_strrpos($text, " ");
          $text = mb_substr($text, 0, $last_space) . "...";
      }
      echo $text;
  }

/**
 * Start a replace accents function.
 *
 * string $str is the sentence.
 */

public static function replaceAccents($str) {
    $accents = ["&", "è"];
    $letters = ["&amp", "e"];
    return str_replace($accents, $letters, $str);
}

public static function test_replace($day) {
    $lang = [];
    include(RESSOURCES_PATH . 'lang/lang-' . LANG . '.php');
    $arrayDays = ['&1', '&2', '&3', '&4', '&5', '&6', '&0'];
    $nameDays = [$lang['monday'] . ' ', $lang['tuesday'] . ' ', $lang['wednesday'] . ' ',  $lang['thursday'] . ' ', $lang['friday'] . ' ',  $lang['saturday'] . ' ', $lang['sunday']];

    $days = str_replace($arrayDays, $nameDays, $day);
    return $days;
}


} // End of Text Class

class Date {
  public static function convertTime($seconds) {
    $H = floor($seconds / 3600);
    $i = ($seconds / 60) % 60;
    $s = $seconds % 60;
    return sprintf("%02d:%02d", $i, $s);
}

public static function giveMethehour($hourset) {
    $phpdate = strtotime($hourset);
    $mysqldate = date('H:i', $phpdate);
    echo "<span class='timeSet'>" . $mysqldate . "</span>";
    } 

/**
 * This function converts a date to a specified format and language,
 * and displays the day and/or hour in the specified language if specified.
 *
 * @param string $date The date to be converted.
 * @param string $format The desired date format.
 * @param string $language The desired language.
 * @param bool $day Whether to display the day in the specified language.
 * @param bool $hour Whether to display the hour in the specified language.
 */

 public static function convertDate($date, $format, $language, $day, $hour) {
    // Check if the language is French
    if ($language == 'french') {
        // Define arrays of English and French days and months
        $english_days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        $french_days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
        $english_months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $french_months = ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];
        // Replace English days and months with French equivalents
        $date = str_replace($english_months, $french_months, str_replace($english_days, $french_days, date($format, strtotime($date))));
    }

    // Check if the day should be displayed in French
    if ($day) {
        // Define arrays of English and French days
        $english_days = ['&1', '&2', '&3', '&4', '&5', '&6', '&0'];
        $french_days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
        // Replace English days with French equivalents
        $date = str_replace($english_days, $french_days, $date);
    }

    // Check if the hour should be displayed in French
    if ($hour) {
        // Define arrays of English and French hours
        $english_hour = ['&1', '&2', '&3', '&4', '&5', '&6', '&7', '&8', '&9', '&10', '&11', '&12', '&13', '&14', '&15', '&16', '&17', '&18', '&19', '&20', '&21', '&22', '&23', '&00'];
        $french_hour = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '00'];
        // Replace English hours with French equivalents
        $date = str_replace($english_hour, $french_hour, $date);
    }

    // Return the converted date
    return $date;
}

} // End of Date class

class Functions {
  public static function likeDislike($event_id, $like) {
    // Connect to the database
    $db = new Database();
    $db_conx_rdj = $db->connect();
    // if(DBConnect::is_logged_in()){
        // Prepare the SELECT statement
        $select_stmt = $db_conx_rdj->prepare("SELECT votes FROM event WHERE id = :event_id");
        $select_stmt->bindParam(':event_id', $event_id);
        $select_stmt->execute();
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
        $votes = $row['votes'];

        // Prepare the UPDATE statement
        if ($like) {
            $votes++;
            $query = "UPDATE event SET votes = :votes WHERE id = :event_id";
        } else {
            $votes--;
            $query = "UPDATE event SET votes = :votes WHERE id = :event_id";
        }
        $update_stmt = $db_conx_rdj->prepare($query);
        $update_stmt->bindParam(':votes', $votes);
        $update_stmt->bindParam(':event_id', $event_id);
        $update_stmt->execute();
  //   } else {
        //if user is not logged in return an error or redirect to login page
     //    echo "You have to be logged in to like or dislike";
    }

    function uploadFile($file, $allowed_extensions, $upload_path) {
      // Get the file details
      $file_name = $file['name'];
      $file_tmp_name = $file['tmp_name'];
      $file_size = $file['size'];
      $file_error = $file['error'];
      $file_type = $file['type'];
  
      // Get the file extension
      $file_ext = explode('.', $file_name);
      $file_ext = strtolower(end($file_ext));
  
      // Check if the file extension is allowed
      if (in_array($file_ext, $allowed_extensions)) {
          // Check for any errors
          if ($file_error === 0) {
              // Check the file size
              if ($file_size <= 1_000_000) {
                  // Generate a new file name to avoid overwriting existing files
                  $file_name_new = uniqid('', true) . '.' . $file_ext;
  
                  // Set the target directory for the uploaded file
                  $file_destination = $upload_path . $file_name_new;
  
                  // Move the uploaded file to the target directory
                  if (move_uploaded_file($file_tmp_name, $file_destination)) {
                      echo "File uploaded successfully!";
                  } else {
                      echo "Error uploading file.";
                  }
              } else {
                  echo "File size is too large.";
              }
          } else {
              echo "Error uploading file.";
          }
      } else {
          echo "Invalid file type.";
      }
  }
} 
// }

/* ['no_copyright_txt'] = Créé avec beaucoup de <i class='fas fa-heart'></i> par noordaStudios. 
    Vous penser enlever ces lignes ? Construisez votre site web vous même!
    Mais pensez-vous avoir les connaissances et/ou la patience d'apprendre, de développer, d'haïr et d'aimer VOTRE script ? 
    Bien sûr que vous pouvez prendre celui-ci, le modifier à votre guise, je n'ai absolument rien contre ça, mais de grâce
    laissez au moins un brin de reconnaissance au développeur que je suis en laissant cette marque dans le code de votre site web. 
    Même pas sur votre page! Juste un petit mot entre développeurs, parce que si vous êtes entrain de lire ça et de le comprendre, 
    c'est que vous être doué.e en php/html/css ! Sur ce, merci d'utiliser ce script et merde avec votre projet ! 

/* ['no_copyright_txt'] = Created with lot of <i class='fas fa-heart'></i> by noordaStudios.
     Do you think to remove theses lines? Build your website yourself!
     But do you think you have the knowledge or the patience to learn, grow, hate and love YOUR script?
     Of course you can take this one, tweak it to your liking, I have absolutely nothing against that, but please
     leave at least a bit of recognition to the developer that I am by leaving this mark in the code of this script.
     Not even on your page! Just a quick note between developers, because if you're reading this and understanding it,
     it means that you are good at php/html/css! With that said, thank you for using this script and good luck with your project!
    
                                                                     -- noordaStudios */