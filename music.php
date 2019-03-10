<!-- Jasur Islomov u1710232 Section number-3 -->
<!DOCTYPE html>
<html>
	<head>
		<title>Music Viewer</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="viewer.css" type="text/css" rel="stylesheet" />
    </head>
    
	<body>

		<div id="header">
			<h1>190M Music Playlist Viewer</h1>
			<h2>Search Through Your Playlists and Music</h2>
            <a href="music.php"><input type="submit" value="Display all files"></a>
		</div>

		<div id="listarea">
			<ul id="musiclist">
                <?php      
                	function size($filesize){
        			if ($filesize > 0 && $filesize < 1024)
            			$filesize = '(' . $filesize . ' b)';
					else if ($filesize > 1024 && $filesize < 1024*1024)
            			$filesize = '(' . $filesize/1024 . ' kb)';
					else if ($filesize > 1024*1024)
            			$filesize = '(' . $filesize/1024/1024 . ' mb)';
        			return $filesize;
   		 			}                        
                    if (isset($_REQUEST['playlist'])){
                        $playlist = $_REQUEST['playlist'];
                        $songslist = file('songs/' . $playlist);
                       
                ?>
                            <li class="mp3item">
                                <a href="songs/<?=$song?>"><?=basename($song)?></a>
                                <?=size(filesize('songs/' . $song));?>
                            </li>
                <?php
                        
                    }
                    else {
                        $songs = glob('songs/*.mp3');
                        $playlists = glob('songs/*.txt');
                    
                        foreach ($songs as $song){
                ?>
                            <li class="mp3item">
                                <a href="<?=$song?>"><?=basename($song)?></a>
                                <?=size(filesize($song));?>
                            </li>
                <?php
                        }
                ?>

                <?php
                        foreach ($playlists as $playlist){
                ?>
                            <li class="playlistitem">
                                <a href="<?=$playlist?>"><?=basename($playlist)?></a>
                                <?=size(filesize($playlist));?>
                            </li>
                <?php
                        }
                    }
                ?>
			</ul>
		</div>  
	</body>
</html>
