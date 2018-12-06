<header class="masthead text-center text-white d-flex">
    <div class="container my-auto">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h1 class="text-uppercase">
                    <strong>Rot13 Download</strong>
                </h1>
                <hr class="my-4">
                <p class="text-faded mb-4">Download File Click Here!</p>
                <a class="btn btn-primary btn-xl js-scroll-trigger" href="#start">Download!</a>
            </div>
                
            </div>
        </div>
    </div>
</header>
<section class="bg-light h-100" id="start">
        <div class="container" >
            <div class="row">
                    <div class="col-lg-8 mx-auto px-5 mb-5">
                        <form action="#" method="GET" class="form form-group">
                            <div class="border border-success h-25 w-100 text-center py-2 bg-primary mb-3">
                                <label class="h4 text-light text-uppercase">
                                    File Enkripsi
                                </label>
                            </div>
                                <table class="table table-sm table-striped table-hover text-center">
                                    <thead class="bg-dark text-light">
                                        <tr>
                                            <th> No </th>
                                            <th> Metode Digunakan </th>
                                            <th> Waktu </th>
                                            <th> Tanggal </th>
                                            <th> Nama File </th>
                                            <th> Download </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $konek = mysqli_connect('127.0.0.1', 'root', '', 'kripto');
                                        $query = "SELECT * FROM rot13 ORDER BY id";
                                        $tampil = mysqli_query($konek, $query);
                                        $no = 1;
                                        while ($r = mysqli_fetch_array($tampil)) {
                                            echo "
                                                <tr>
                                                    <td scope=\"row\">$no</td>
                                                    <td>$r[metode]</td>
                                                    <td>$r[waktu]</td>
                                                    <td>$r[tgl]</td>
                                                    <td>$r[file_en]</td>
                                                    <td><a href='../File/Enkripsi/$r[file_en]'><input type='button' class='btn-success' value='Download Now'></a></td>
                                                </tr>";
                                            $no++;
                                        } ?>
                                        
                                    </tbody>
                                </table>
                            </form>
                    </div>

                    <div class="col-lg-8 mx-auto px-5 ">
                        <form action="#" method="GET" class="form form-group">
                            <div class="border border-success h-25 w-100 text-center py-2 bg-primary mb-3">
                                <label class="h4 text-light text-uppercase">
                                    File Deskripsi
                                </label>
                            </div>
                                <table class="table table-sm table-striped table-hover text-center">
                                    <thead class="bg-dark text-light">
                                        <tr>
                                            <th> No </th>
                                            <th> Metode Digunakan </th>
                                            <th> Waktu </th>
                                            <th> Tanggal </th>
                                            <th> Nama File </th>
                                            <th> Download </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $konek = mysqli_connect('127.0.0.1', 'root', '', 'kripto');
                                        $query = "SELECT * FROM rot132 ORDER BY id";
                                        $tampil = mysqli_query($konek, $query);
                                        $no = 1;
                                        while ($r = mysqli_fetch_array($tampil)) {
                                            echo "
                                                <tr>
                                                    <td scope=\"row\">$no</td>
                                                    <td>$r[metode]</td>
                                                    <td>$r[waktu]</td>
                                                    <td>$r[tgl]</td>
                                                    <td>$r[file_de]</td>
                                                    <td><a href='../File/Deskripsi/$r[file_de]'><input type='button' class='btn-success' value='Download Now'></a></td>
                                                </tr>";
                                            $no++;
                                        } ?>
                                        
                                    </tbody>
                                </table>
                            </form>
                    </div>
            </div>
        </div>
    </section>