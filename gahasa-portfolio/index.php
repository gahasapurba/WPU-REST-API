<?php

function get_CURL($url)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    curl_close($curl);

    return json_decode($result, true);
}

$result = get_CURL('https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UCsKxmOgCoYAjxjLOufpuYEA&key=AIzaSyCUM4Bgp8O9ZrMhk0Dt4Ea5rTxT7FZdiRA');

$youtubeProfilePic = $result['items'][0]['snippet']['thumbnails']['medium']['url'];
$channelName = $result['items'][0]['snippet']['title'];
$subscriber = $result['items'][0]['statistics']['subscriberCount'];

// Latest Video
$urlLatestVideo = 'https://www.googleapis.com/youtube/v3/search?key=AIzaSyCUM4Bgp8O9ZrMhk0Dt4Ea5rTxT7FZdiRA&channelId=UCsKxmOgCoYAjxjLOufpuYEA&maxResults=1&order=date&part=snippet';

$result = get_CURL($urlLatestVideo);
$latestVideoId = $result['items'][0]['id']['videoId'];

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Latihan Bootstrap 4 - Portfolio</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body class="mt-5">

    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Gahasa Purba</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="#">About</a>
                    <a class="nav-item nav-link" href="#">Portfolio</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="jumbotron" id="home">
        <div class="container">
            <div class="text-center">
                <img src="img/0.jpg" alt="Gahasa Purba" class="rounded-circle img-thumbnail">
                <h1 class="display-4">Gahasa Purba</h1>
                <h3 class="lead">Student | Programmer | Photographer</h3>
            </div>
        </div>
    </div>

    <!-- About -->
    <section class="about" id="about">
        <div class="container">
            <div class="row mb-4">
                <div class="col text-center">
                    <h2>About</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-5 text-justify">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repellat numquam quam tempore
                        mollitia, pariatur voluptate hic ad molestiae architecto voluptatibus dolor itaque, ex. Neque
                        quas voluptatum, quis, fugit adipisci quasi impedit qui, doloremque necessitatibus est sequi
                        nesciunt ipsa. Dolorum reiciendis quidem repudiandae, ea, aliquam, debitis, illo doloremque
                        eveniet aut beatae tempora? Cumque, totam, possimus. Non consequuntur eum ab expedita. Itaque
                        consequuntur rerum sint fugit. Quo accusantium deleniti molestias voluptatibus explicabo debitis
                        tempore, similique. Deserunt doloribus hic velit vitae, tempora illum eum magni unde saepe natus
                        minima molestias possimus tenetur blanditiis excepturi alias odio, ut error illo quam delectus
                        aspernatur!</p>
                </div>
                <div class="col-md-5 text-justify">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repellat numquam quam tempore
                        mollitia, pariatur voluptate hic ad molestiae architecto voluptatibus dolor itaque, ex. Neque
                        quas voluptatum, quis, fugit adipisci quasi impedit qui, doloremque necessitatibus est sequi
                        nesciunt ipsa. Dolorum reiciendis quidem repudiandae, ea, aliquam, debitis, illo doloremque
                        eveniet aut beatae tempora? Cumque, totam, possimus. Non consequuntur eum ab expedita. Itaque
                        consequuntur rerum sint fugit. Quo accusantium deleniti molestias voluptatibus explicabo debitis
                        tempore, similique. Deserunt doloribus hic velit vitae, tempora illum eum magni unde saepe natus
                        minima molestias possimus tenetur blanditiis excepturi alias odio, ut error illo quam delectus
                        aspernatur!</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Youtube & IG -->
    <section class="social bg-light" id="social">
        <div class="container">
            <div class="row mb-4 pt-4">
                <div class="col text-center">
                    <h2>Social Media</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="<?= $youtubeProfilePic; ?>" width="200" class="rounded-circle img-thumbnail">
                        </div>
                        <div class="col-md-8">
                            <h5><?= $channelName; ?></h5>
                            <p><?= $subscriber; ?> Subscribers.</p>
                            <div class="g-ytsubscribe" data-channelid="UCsKxmOgCoYAjxjLOufpuYEA" data-layout="default" data-count="default"></div>
                        </div>
                    </div>
                    <div class="row mt-3 pb-3">
                        <div class="col">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $latestVideoId; ?>" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="img/0.jpg" width="200" class="rounded-circle img-thumbnail">
                        </div>
                        <div class="col-md-8">
                            <h5>@gahasapurba</h5>
                            <p>100000 Followers.</p>
                        </div>
                    </div>
                    <div class="row mt-3 pb-3">
                        <div class="col">
                            <div class="ig-thumbnail">
                                <img src="img/1.jpg">
                            </div>
                            <div class="ig-thumbnail">
                                <img src="img/2.jpg">
                            </div>
                            <div class="ig-thumbnail">
                                <img src="img/3.jpg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio -->
    <section class="portfolio" id="portfolio">
        <div class="container">
            <div class="row mb-4 pt-4">
                <div class="col text-center">
                    <h2>Portfolio</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md mb-4">
                    <div class="card">
                        <img src="img/1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md mb-4">
                    <div class="card">
                        <img src="img/2.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md mb-4">
                    <div class="card">
                        <img src="img/3.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md mb-4">
                    <div class="card">
                        <img src="img/4.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md mb-4">
                    <div class="card">
                        <img src="img/5.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md mb-4">
                    <div class="card">
                        <img src="img/6.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact -->
    <section class="contact bg-light" id="contact">
        <div class="container">
            <div class="row mb-4 pt-4">
                <div class="col text-center">
                    <h2>Contact</h2>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="card text-white bg-primary mb-4 text-center">
                        <div class="card-body">
                            <h5 class="card-title">Contact Us</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>

                    <ul class="list-group mb-4">
                        <li class="list-group-item"><h3>Location</h3></li>
                        <li class="list-group-item">My Office</li>
                        <li class="list-group-item">Institut Teknologi Del</li>
                        <li class="list-group-item">North Sumatera, Indonesia</li>
                    </ul>
                </div>

                <div class="col-lg-6 ">
                    
                    <form>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" placeholder="Masukkan Email">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" placeholder="Masukkan Phone Number">
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" rows="3" placeholder="Masukkan Message"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-primary">Send Message</button>
                        </div>
                    </form>
                
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white mt-5">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <p>Copyright &copy; 2019.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://apis.google.com/js/platform.js"></script>
</body>

</html>