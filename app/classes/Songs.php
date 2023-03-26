<?php

namespace App\Classes;

use App\Helpers\DateFormater;
use App\Helpers\Texter;
use PDO;

class Songs
{

    /**
     * Display countdown of most played songs.
     *
     * @param int $song_count_limit The number of songs to display.
     */

    public static function displayCountdown(int $song_count_limit)
    {
        $query = "SELECT * FROM songs WHERE song_type = 0 AND count_played > 0 AND id_subcat != 5 AND enabled = 1 ORDER BY count_played DESC LIMIT $song_count_limit";
        $database_connection = (new Database())->connect();
        $statement = $database_connection->prepare($query);
        $statement->execute();

        if ($statement->rowCount() > 0) {
            $rank = 1;
            while ($song = $statement->fetch()) {
                $show_artist = Texter::replaceAccents($song['artist']);
                $show_track = Texter::replaceAccents($song['title']);
                $fileName = $song['image'];
?>
                <div class="row border-bottom border-3 bg-light p-2">
                    <div class="col-1 d-flex align-items-center mx-4">
                        <h4 style="color:var(--dark-text);"><?php echo $rank++; ?></h4>
                    </div>
                    <div class="col-2 me-3"><?= Layout::getCoverImage($show_artist, $show_track, $fileName) ?></div>
                    <div class="col-6">
                        <div class='song_title'><?= Texter::cutText($show_artist, 30); ?></div>
                        <div class='song_artist'><?= Texter::cutText($show_track, 40); ?></div>
                    </div>
                </div>
            <?php
            }
            $statement->closeCursor(); // End the query processing
        } else {
            echo '<div id="widget" style="padding: 20px;">
<div class="bd-callout bd-callout-info">
<p>' . _('No songs played.') . '</p>
</div>
</div>';
        }
    }
    /**
     * 
     * This function displays the last played song on Rewind Radio.
     *
     */
    public static function displayLastPlayedSong()
    {
        // Connect to the database
        $db = new Database();
        $db_conx_rdj = $db->connect();
        // Select the last played song with song type 0 from the history table
        $query = "SELECT * FROM songs WHERE song_type = ? AND count_played > 0 ORDER BY date_played DESC LIMIT ?, ?";
        $stmt = $db_conx_rdj->prepare($query);
        $stmt->bindValue(1, 0, PDO::PARAM_INT);
        $stmt->bindValue(2, 1, PDO::PARAM_INT);
        $stmt->bindValue(3, PLAYINFO, PDO::PARAM_INT);
        $stmt->execute();
        // Check if a song was found
        if ($stmt->rowCount() > 0) {
            // Fetch the song
            while ($song = $stmt->fetch()) {
                // Replace some characters in the artist and title
                $accents = ["&", "è"];
                $letters = ["&amp", "e"];
                $show_artist = str_replace($accents, $letters, (string) $song['artist']);
                $show_track = str_replace($accents, $letters, (string) $song['title']);
                $fileName = $song['image'];
                // Display the song
            ?>

                <!-- Display the content-->
                <div class="row border-bottom border-3 bg-light p-2">
                    <div class="col-1 d-flex align-items-center mx-4">
                        <?= DateFormater::giveMethehour($song['date_played']); ?>
                    </div>
                    <div class="col-2 me-3"><?= Layout::getCoverImage($show_artist, $show_track, $fileName) ?></div>
                    <div class="col-6">
                        <div class='song_title'><?= Texter::cutText($show_artist, 30); ?></div>
                        <div class='song_artist'><?= Texter::cutText($show_track, 40); ?></div>
                    </div>
                </div>
            <?php
            }
        } else {
            // No song was found
            echo '<div id="widget" style="padding: 20px;">';
            echo '<div class="bd-callout bd-callout-info">';
            echo '<p>' . _('Nothing found.') . '</p>';
            echo '</div>';
            echo '</div>';
        }
    }
    /**
     *
     * Display not already played requests.
     *
     */
    public static function displayTopRequests()
    {
        $query = "SELECT songs.ID, songs.artist, songs.title, songs.image, requests.username, requests.requested, 
COUNT(*) AS requests FROM songs LEFT JOIN requests ON songs.ID = requests.songID WHERE TIMESTAMPDIFF( DAY, requests.requested, NOW() ) <= 365 AND PLAYED = 0 GROUP BY songs.ID ORDER BY requests DESC LIMIT 0,4";

        $db = new Database();
        $db_conx_rdj = $db->connect();
        $stmt = $db_conx_rdj->prepare($query);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            while ($song = $stmt->fetch()) {
                $username = $song['username'];
                $accents = ["&", "è"];
                $letters = ["&amp", "e"];
                $show_artist = str_replace($accents, $letters, (string) $song['artist']);
                $show_track = str_replace($accents, $letters, (string) $song['title']);
                $fileName = $song['image'];
            ?>
                <div class="row border-bottom border-3 bg-light p-2">
                    <div class="col-2 mx-3"><?= Layout::getCoverImage($show_artist, $show_track, $fileName) ?></div>
                    <div class="col-6">
                        <div class='song_title'><?= Texter::cutText($show_artist, 30); ?></div>
                        <div class='song_artist'><?= Texter::cutText($show_track, 40); ?></div>
                        <div class='song_artist'><?= _("Asked by"); ?><?= Texter::cutText($username, 40); ?></div>
                        <div class='song_artist'><?= _("Asked at"); ?> : <?= $song['requested']; ?></div>
                    </div>
                </div>
            <?php
            }
            $stmt->closeCursor(); // End the query processing
        } else {
            echo '<div id="widget" style="padding: 20px;">
<div class="bd-callout bd-callout-info">
<p>' . _('Nothing found.') . '</p></div>
</div>';
        }
    }

    public static function displayEvents(int $catID)
    {
        $db = new Database();
        $db_conx_rdj = $db->connect();
        $reponse = $db_conx_rdj->query("SELECT * FROM events
LEFT JOIN " . PREFIX . "_events_info ON events.id = " . PREFIX . "_events_info.event_id
WHERE catID=$catID ORDER BY events.time ASC");
        $events = $reponse->fetchAll();
        if ($reponse->rowCount() > 0) {
            foreach ($events as $event) {
            ?>
                <div class="row border-bottom border-3 bg-light p-2">
                    <div class="col-2 mx-3">
                        <img src="/uploads/events/<?php echo $event['image']; ?>" alt='cover' class='rounded-4 img-cover' width="105" height="105">
                    </div>
                    <div class="col-5">
                        <div class='song_title'><?php echo $event['name']; ?></div>
                        <div class='song_artist'><?php echo $event['tags']; ?></div>
                        <div class='song_artist'>
                            <?php
                            echo Texter::test_replace($event['day']);
                            echo $event['time'];
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-3 my-auto"><button class="btn btn-dark"><?= _('Add to my calendar'); ?></button></div>
                </div>
            <?php
            }
        } else {
            echo '<div id="widget" style="padding: 20px;">
<div class="bd-callout bd-callout-info">
<p>' . _('Nothing found.') . '</p></div>
</div>';
        }
        $reponse->closeCursor();
    }
    public static function displayShows(int $parentID)
    {
        global $router;
        $query = "SELECT * FROM subcategory
JOIN " . PREFIX . "_subcategory_info
ON subcategory.id = " . PREFIX . "_subcategory_info.subcategory_id WHERE subcategory.parentid=$parentID";
        $db = new Database();
        $db_conx_rdj = $db->connect();
        $stmt = $db_conx_rdj->prepare($query);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            while ($show = $stmt->fetch()) {
                $id = $show['id'];
            ?>

                <div class="row border-bottom-3 bg-light p-2 mb-2" style="background-image: url('/uploads/shows/<?= $show['image']; ?>'); background-position:center; background-size:cover;">
                    <h4 class="text-light p-3 text-uppercase fw-bolder"><?= $show['name']; ?></h4>
                    <div class="description mb-3 p-2 bg-light text-dark"><?= Texter::cutText($show['description'], 120); ?>
                        <div class="tags m-2 px-3 py-2" style="background-color: #eaeaea;">
                            <i class="bi bi-tags-fill" style="margin-right: 10px;"></i> <?= $show['tags']; ?>
                        </div>
                    </div>

                    <div class="d-grid gap-2 d-md-block">
                        <a class="btn btn-dark" href="<?= $router->generate('single_show', ['id' => $id]); ?>"><?= _("More informations"); ?></a>
                        <a class="btn btn-dark" href="audio/<?= strtolower(str_replace(' ', '_', (string) $show['name'])); ?>/podcasts_rss.php">
                            <?= _("Subscribe to this podcast"); ?></a>
                    </div>
                </div>
<?php }
            $stmt->closeCursor();
        } else { {
                echo '<div id="widget" style="padding: 20px;">
<div class="bd-callout bd-callout-info">
<p>' . _('Nothing found.') . '</p>
 </div>
</div>';
            }
        }
    }

    /**
     * This function retrieves and displays the schedule for a specified day.
     *
     * @param string $day The day for which to retrieve the schedule.
     */

    public static function getSchedule(string $day, int $catID)
    {
        // Connect to the database
        $db = new Database();
        $db_conx_rdj = $db->connect();

        // Select all events with the specified category and the specified day
        $stmt = $db_conx_rdj->prepare("SELECT e.*, aei.image FROM events AS e LEFT JOIN " . PREFIX . "_events_info AS aei ON e.ID = aei.event_id WHERE catID = :catID AND day = :day AND enabled = 1;");
        $stmt->bindValue(':catID', $catID);
        $stmt->bindValue(':day', $day);
        $stmt->execute();

        // Check if any events were found
        if ($stmt->rowCount() > 0) {
            $events = $stmt->fetchAll();
            // return $events; // you can return the array of events to see if it's working 
            // Fetch each event
            foreach ($events as $event) {
                // Extract the event hours
                $eventName = $event['name'];
                $hours = $event['time'];
                // Display the event
                echo '
<!-- Schedule Item -->
<div class="col-md-6">
<div class="timetable-item">
    <div class="timetable-item-img">
        <img src="/uploads/' . $event['image'] . '" alt="' . $eventName . '" width="105" height="105">
    </div>
<div class="timetable-item-main">
    <div class="timetable-item-time">' . $hours . '</div>
    <div class="timetable-item-title">' . $eventName . '</div>
    <div class="timetable-item-desc">
        <p>' . $event['data'] . '</p>
    </div>
</div>
</div>
 </div>';
            }
        } else {
            echo '<div class="alert alert-info mt-3">' . _('Nothing found.') . '</div>';
        }
    }
}
