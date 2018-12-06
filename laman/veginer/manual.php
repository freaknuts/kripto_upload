<header class="masthead text-center text-white d-flex">
    <div class="container my-auto">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h1 class="text-uppercase">
                    <strong>Veginer manual</strong>
                </h1>
                <hr class="my-4">
                <p class="text-faded mb-4">Mulai Aplikasi Tekan Tombol</p>
                <a class="btn btn-primary btn-xl js-scroll-trigger" href="#start">Get Started!</a>
            </div>
                
            </div>
        </div>
    </div>
</header>
<?php
        require 'function/CodeC4.php';
        $plain = "";
        $key = "";
        $hasil = "";
        if (isset($_POST['enkripsi'])) {
            $plain = $_POST['teks'];
            $key = $_POST['key'];
            encrypt($key,$plain);
            $hasil = encrypt($key,$plain);
        } elseif (isset($_POST['deskripsi'])) {
            $plain = $_POST['teks'];
            $key = $_POST['key'];
            decrypt($key,$plain);
            $hasil = decrypt($key,$plain);
        }
?>
<section class="bg-light h-100" id="start">
        <div class="container" >
            <div class="row">
                    <div class="col-lg-8 mx-auto px-5">
                        <form method='post' action='#hasil' class="form form-group-lg">
                            <div class="mb-1 p-3 bg-dark border border-danger text-warning">
                                <span>Masukkan Kalimat Plaintext Atau Chipertext.... </span>
                            </div>
                                <textarea placeholder="Masukkan Plaintext Atau Ciphertext....." name="teks" rows="7" class="form-control form-control-lg" ><?=$hasil?></textarea>
                            <div class="mt-4 p-3 bg-dark border border-danger text-warning">
                                <span>Masukkan Kalimat Key....</span>
                            </div>
                                <input placeholder="Masukkan Key...." value="<?=$key?>"name="key" class="form-control form-control-lg" >
                            <div class="mx-1 my-3 w-100 ">
                                <input type="submit" class="btn btn-md btn-success w-25 " name="enkripsi" value="Enkripsi">
                                <input type="submit" class="btn btn-md btn-success w-25 " name="deskripsi" value="Deskripsi"> 
                            </div>
                        </form>
                       
                    </div>
                    <div class="col-lg-8 mx-auto px-5 my-5" id="hasil">
                        <div class="text-center">
                            <h4 class="border border-warning py-2 jumbotron">Output :<h4>
                            <hr class="py-2">
                        </div>
                        <div class="border border-success jumbotron mx-auto py-2">
                            <dl>
                                <dt class="h4">Kalimat Plaintext    :</dt>
                                    <dd>-  <?= $plain ?></dd>
                                <dt class="h4">Key                  :</dt>
                                    <dd>-  <?= $key ?></dd>
                                <dt class="h4">Kalimat Chipertext   :</dt>
                                    <dd>-  <?= $hasil ?></dd>
                            </dl>   
                        </div>
                    </div>
            </div>
        </div>
    </section>