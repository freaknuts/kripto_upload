<header class="masthead text-center text-white d-flex ">
    <div class="container my-auto">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h1 class="text-uppercase">
                    <strong>Veginer Upload</strong>
                </h1>
                <hr class="my-4">
                <p class="text-faded mb-4">Mulai Aplikasi Tekan Tombol</p>
                <a class="btn btn-primary btn-xl js-scroll-trigger" href="#start">Get Started!</a>
            </div>

        </div>
    </div>
</div>
</header>
<section class="bg-light h-auto" id="start">
    <div class="container" >
        <div class="row">
            <div class="col-lg-8 mx-auto px-5 my-5">
                <form method='post' action='#hasil' class="form form-group-lg" enctype="multipart/form-data">
                    <div class="mb-1 p-3 bg-dark border border-danger text-warning">
                        <span>Upload File Anda! </span>
                    </div>
                    <input type="file" name="file" class="form-control-file" >
                    <div class="mt-4 p-3 w-50 bg-dark border border-danger text-warning">
                        <span>Masukkan Kalimat Key! </span>
                    </div>
                    <input placeholder="Masukkan Key...." name="key" class="form-control form-control-lg w-50" >
                    <div class="mx-1 my-3 w-100 ">
                        <input type="submit" class="btn btn-md btn-success w-25 " name="enkripsi" value="Enkripsi">
                        <input type="submit" class="btn btn-md btn-success w-25 " name="deskripsi" value="Deskripsi"> 
                    </div>
                </form>
            </div>
            <?php
            require 'function/CodeC4.php';
            $file1 = "";
            $method = "";
            $key = "";
            if (isset($_POST['enkripsi'])) {
                $allowed = array('doc', 'txt'); //untuk memasukan & menambahkan ekstensi file
                $key = $_POST['key'];
                $filename = $_FILES['file']['name'];
                $lokasifile = $_FILES['file']['tmp_name'];
                $tipefile = $_FILES['file']['type'];
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if (empty($filename or $lokasifile)) {
                    echo "<script>window.alert('Mohon File Di Masukkan!');
                                window.location = 'index.php?page=cupload#hasil'</script>";
                } elseif (!in_array($ext, $allowed)) {
                    echo "<script>window.alert('File Ekstensi Yang Didukung Doc dan Txt!');
                                window.location = 'index.php?page=cupload#hasil'</script>";
                } else {
                    if ($ext == "doc") {
                        $acak = rand(1, 99);
                        $namafile = $acak . $filename;
                        move_uploaded_file($lokasifile, "../File/" . "Origin/" . $namafile);
                        //proses 1
                        $file1 = $namafile;
                        $file = "../File/" . "Origin/" . $file1;
                        $fileHandle = fopen($file, "r");
                        $line = @fread($fileHandle, filesize($file));
                        $lines = explode(chr(0x0D), $line);
                        $read = "";
                        foreach ($lines as $thisline) {
                            $pos = strpos($thisline, chr(0x00));
                            if (($pos !== false) || (strlen($thisline) == 0)) {
                            } else {
                                $read .= $thisline . " ";
                            }
                        }
                        $method = encrypt($key, $read);
                        //simpan
                        $file2 = "../File/" . "Enkripsi/" . $file1;
                        $fp = fopen($file2, "w");
                        fputs($fp, $method);
                        fclose($fp);
                    } elseif ($ext == "txt") {
                        $acak = rand(1, 99);
                        $namafile = $acak . $filename;
                        move_uploaded_file($lokasifile, "../File/" . "Origin/" . $namafile);
                        //proses 1
                        $file1 = $namafile;
                        $file = "../File/" . "Origin/" . $file1;
                        $fp = fopen($file, "r"); // buka file hasil enkripsi
                        $read = fread($fp, filesize($file));
                        $method = encrypt($key, $read);
                        //simpan
                        $file2 = "../File/" . "Enkripsi/" . $file1;
                        $fp = fopen($file2, "w");
                        fputs($fp, $method);
                        fclose($fp);
                    }
                    ?>
                    <div class="col-lg-8 mx-auto px-5 my-2" id="hasil">
                        <div class="text-center">
                            <h4 class="border border-warning py-2 jumbotron">Output :<h4>
                                <hr class="py-2">
                        </div>
                            <div class="mb-1 p-3 bg-dark border border-danger text-warning">
                                <span>Kalimat Dokumen : </span>
                            </div>
                                <textarea placeholder="Masukkan Plaintext Atau Ciphertext....." name="teks" rows="7" class="form-control form-control-lg" ><?= $method ?></textarea>
                                    <div class="border border-danger bg-success text-light mb-2">
                                        Nama File : <?php echo $namafile ?>Telah Disimpan!
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php

            }
           //SQL
            $jam_sekarang = date("H:m:s");
            $tanggal = date("Y-m-d");
            $konek = mysqli_connect('127.0.0.1', 'root', '', 'kripto');
            $input = "INSERT INTO veginer(id, metode, waktu, tgl, file_en, kunci) 
           VALUES ('','Vegineer Enkripsi','$jam_sekarang', '$tanggal', '$file1','$key')";
            mysqli_query($konek, $input);

        } elseif (isset($_POST['deskripsi'])) {
            $allowed = array('doc', 'txt'); //untuk memasukan & menambahkan ekstensi file
            $key = $_POST['key'];
            $filename = $_FILES['file']['name'];
            $lokasifile = $_FILES['file']['tmp_name'];
            $tipefile = $_FILES['file']['type'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if (empty($filename or $lokasifile)) {
                echo "<script>window.alert('Mohon File Di Masukkan!');
                            window.location = 'index.php?page=cupload#hasil'</script>";
            } elseif (!in_array($ext, $allowed)) {
                echo "<script>window.alert('File Ekstensi Yang Didukung Doc dan Txt!');
                            window.location = 'index.php?page=cupload#hasil'</script>";
            } else {
                if ($ext == "doc") {
                    $acak = rand(1, 99);
                    $namafile = $acak . $filename;
                    move_uploaded_file($lokasifile, "../File/" . "Origin/" . $namafile);
                     //proses 1
                    $file1 = $namafile;
                    $file = "../File/" . "Origin/" . $file1;
                    $fileHandle = fopen($file, "r");
                    $line = @fread($fileHandle, filesize($file));
                    $lines = explode(chr(0x0D), $line);
                    $read = "";
                    foreach ($lines as $thisline) {
                        $pos = strpos($thisline, chr(0x00));
                        if (($pos !== false) || (strlen($thisline) == 0)) {
                        } else {
                            $read .= $thisline . " ";
                        }
                    }
                    $method = decrypt($key, $read);
                    //simpan
                    $file2 = "../File/" . "Deskripsi/" . $file1;
                    $fp = fopen($file2, "w");
                    fputs($fp, $method);
                    fclose($fp);
                } elseif ($ext == "txt") {
                    $acak = rand(1, 99);
                    $namafile = $acak . $filename;
                    move_uploaded_file($lokasifile, "../File/" . "Origin/" . $namafile);
                    //proses 1
                    $file1 = $namafile;
                    $file = "../File/" . "Origin/" . $file1;
                    $fp = fopen($file, "r"); // buka file hasil enkripsi
                    $read = fread($fp, filesize($file));
                    $method = decrypt($key, $read);
                    //simpan
                    $file2 = "../File/" . "Deskripsi/" . $file1;
                    $fp = fopen($file2, "w");
                    fputs($fp, $method);
                    fclose($fp);
                }
                ?>
                <div class="col-lg-8 mx-auto px-5 my-2" id="hasil">
                <div class="text-center">
                    <h4 class="border border-warning py-2 jumbotron">Output :<h4>
                            <hr class="py-2">
                            </div>
                            <div class="mb-1 p-3 bg-dark border border-danger text-warning">
                                <span>Kalimat Dokumen : </span>
                            </div>
                                <textarea placeholder="Masukkan Plaintext Atau Ciphertext....." name="teks" rows="7" class="form-control form-control-lg" ><?= $method ?></textarea>
                              
                            <div class="border border-success bg-success text-light">
                                Nama File : <?php echo $namafile ?>Telah Disimpan!
                            </div>
                        </div>
                    </div>
                </div>
                <?php

            }   
             //SQL
            $jam_sekarang = date("H:m:s");
            $tanggal = date("Y-m-d");
            $konek = mysqli_connect('127.0.0.1', 'root', '', 'kripto');
            $input = "INSERT INTO veginer2(id, metode, waktu, tgl, file_de, kunci) 
             VALUES ('','Vegineer Deskripsi','$jam_sekarang', '$tanggal', '$file1','$key')";
            mysqli_query($konek, $input);

        }
        ?>
            </section>