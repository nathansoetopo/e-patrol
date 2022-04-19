@extends('components.admin.template')

@section('title','Data Lokasi')

<style>
    #myMap {
        width: 100%;
        height: 380px;
    }

    :root {
        font-size: 62.5%;
    }

    * {
        margin: 0;
        padding: 0;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        -moz-text-size-adjust: none;
        -ms-text-size-adjust: none;
        text-size-adjust: none;
        -webkit-text-size-adjust: none;
    }

    button:hover {
        cursor: pointer;
    }

    .heading {
        margin: 3rem 0 5rem 0;
    }

    .title,
    .sub-title {
        font-size: 4rem;
        text-align: center;
        font-family: 'Poppins', sans-serif;
        color: #12130F;
    }

    .user-input {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        width: 100%;
    }

    .user-input label {
        text-align: center;
        font-size: 1.5rem;
        font-family: 'Poppins', sans-serif;
    }

    .user-input input {
        width: 80%;
        max-width: 35rem;
        font-family: 'Poppins', sans-serif;
        outline: none;
        border: none;
        border-radius: 0.5rem;
        border: 2px solid black;
        background-color: none;
        text-align: center;
        padding: 0.7rem 1rem;
        margin: 1rem 1rem 2rem 1rem;
    }

    .button {
        outline: none;
        border: none;
        border-radius: 0.5rem;
        padding: 0.7rem 1rem;
        margin-bottom: 3rem;
        background-color: black;
        color: #fff;
        font-family: 'Poppins', sans-serif;
    }

    .qr-code {
        border-top: 0.5rem solid black;
        border-right: 0.5rem solid black;
        border-bottom: 1rem solid black;
        border-radius: 0.5rem;
        border-bottom-left-radius: 0.5rem;
        border-bottom-right-radius: 0.5rem;
        border-left: 0.5rem solid black;
        background-color: #fff;
        margin-bottom: 6rem;
        border: 2px;
    }

    .qr-code button {
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        background-color: black;
        font-family: 'Poppins', sans-serif;
        color: #EAE6E5;
        border: none;
        outline: none;
        width: 100%;
        height: 20%;
        margin-top: 1rem;
    }

    .qr-code button a {
        width: 100%;
        height: 100%;
        text-decoration: none;
        color: #EAE6E5;
    }

</style>

@section('main-content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-warning alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                {{ $error }}
            </div>
        </div>
        @endforeach
        @endif
        @if (session('status'))
        <div class="alert alert-info alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                {{ session('status') }}
            </div>
        </div>
        @endif
        <div class="section-header">
            <h1>PT. Rusyida Mitra Perkasa</h1>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="border-radius: 30px;" class="input-group-text">
                            <input style="border: none;" type="text" class="form-control" placeholder="Search"
                                aria-label="Search">
                            <button class="btn btn-light" type="button"><i style="right: 70px;"
                                    class="fas fa-search"></i></button>
                        </div>
                        <div class="col-lg-8">

                        </div>
                        <div style="border-radius: 30px; position: absolute; object-position: center; left: 84%;">
                            <button style="padding-top: 2%; padding-bottom: 2%;" data-toggle="modal"
                                data-target="#addData" class="btn btn-light" type="button">Tambah Titik <i
                                    class="fas fa-plus"></i></button>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Latitude</th>
                                        <th scope="col">Longitude</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barcodes as $key => $b)
                                    <tr>
                                        <th scope="row">{{ $key+1 }}</th>
                                        <td>{{ $b->name }}</td>
                                        <td>{{ $b->latitude }}</td>
                                        <td>{{ $b->longitude }}</td>
                                        <td>
                                            @if ($b->status == 'ACTIVE')
                                            <span class="badge badge-success">Aktif</span>
                                            @else
                                            <span class="badge badge-danger">Nonaktif</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="#" id="modal-7" data-toggle="modal"
                                                data-target="#barcodeLocation{{ $b->id }}"
                                                class="btn btn-transparent text-center text-dark">
                                                <i class="fas fa-qrcode fa-2x"></i>
                                            </a>
                                            <a href="#" id="modal-7" data-toggle="modal"
                                                data-target="#updateDataStatus{{ $b->id }}"
                                                class="btn btn-transparent text-center text-dark">
                                                <i class="fas fa-power-off fa-2x"></i>
                                            </a>
                                            <a href="#" id="modal-7" data-toggle="modal"
                                                data-target="#deleteData{{ $b->id }}"
                                                class="btn btn-transparent text-center text-dark">
                                                <i class="fas fa-trash-alt fa-2x"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row justify-content-center">
                            <div class="buttons">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li
                                            class="{{ ($barcodes->currentPage() == 1) ? 'page-item disabled' : 'page-item' }}">
                                            <a class="page-link" href="{{ $barcodes->url($barcodes->currentPage()-1) }}"
                                                aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                        </li>
                                        @for ($i = 1; $i <= $barcodes->lastPage(); $i++)
                                            <li
                                                class="{{ ($barcodes->currentPage() == $i) ? 'page-item active' : 'page-item' }}">
                                                <a class="page-link" href="{{ $barcodes->url($i) }}">{{ $i }}</a></li>
                                            @endfor
                                            <li
                                                class="{{ ($barcodes->currentPage() == $barcodes->lastPage()) ? 'page-item disabled' : 'page-item' }}">
                                                <a class="page-link" href="{{ $barcodes->url($barcodes->currentPage()+1) }}"
                                                    aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>
</div>
</section>

@include('pages.admin.modal.create-location')
@include('pages.admin.modal.update-lokasi-status')
@include('pages.admin.modal.delete-location')
@include('pages.admin.modal.barcode-location')

<!--Modal QR Code-->
<div class="modal fade" tabindex="-1" role="dialog" id="qrDetail">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Qr Codes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <h1>Menampilkan QR Codes</h1>

            </div>
        </div>
    </div>
</div>

<!--Modal Generate Code-->
<div class="modal fade" tabindex="-1" role="dialog" id="generate">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Generate Code</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <section class="heading">
                            <div class="title">QRcodes</div>

                        </section>
                    </div>
                    <div class="mb-3">
                        <section class="user-input">
                            {{-- <label for="input_text">Konten</label> --}}
                            <input type="text" name="input_text" id="input_text" autocomplete="off" readonly>
                            <button class="button" type="submit">Buat Barcode</button>
                            <div class="mb-3">
                                <div class="qr-code" style="display: none;"></div>
                                <div class="nampil"></div>
                            </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="submit"
                            style="transform: translateX(-65%); width: 174px; border-radius: 30px; background-color: #4285F4;"
                            class="btn text-white">Tambah Generate Code</button>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection



<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAj0mbXXxqrgmAy3v2S6rAiNh8XyM-Yr1M&callback=initMap"
    type="text/javascript"></script>
<script>
    let map;
    // letak = { lat: $data->latitude, lng: $data->longitude };
    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            center: {
                lat: -7.565575691874592,
                lng: 110.86450695991516
            },
            zoom: 15,
            scrollwheel: true,
        });
        const uluru = {
            lat: -7.565575691874592,
            lng: 110.86450695991516
        };
        let marker = new google.maps.Marker({
            position: uluru,
            map: map,
            draggable: true
        });
        google.maps.event.addListener(marker, 'position_changed',
            function () {
                let lat = marker.position.lat()
                let lng = marker.position.lng()
                $('#lat').val(lat)
                $('#lng').val(lng)
            })
        google.maps.event.addListener(map, 'click',
            function (event) {
                pos = event.latLng
                marker.setPosition(pos)
            })
    }

</script>

<script>
    let btn = document.querySelector(".button");
    let qr_code_element = document.querySelector(".qr-code");

    btn.addEventListener("click", () => {
        let user_input = document.querySelector("#input_text");
        if (user_input.value != "") {
            if (qr_code_element.childElementCount == 0) {
                generate(user_input);
            } else {
                qr_code_element.innerHTML = "";
                generate(user_input);
            }
        } else {
            console.log("not valid input");
            qr_code_element.style = "display: none";
        }
    })

    function generate(user_input) {

        qr_code_element.style = "";

        var qrcode = new QRCode(qr_code_element, {
            text: `${user_input.value}`,
            width: 180, //128
            height: 180,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H
        });

        let download = document.createElement("button");
        qr_code_element.appendChild(download);

        let download_link = document.createElement("a");
        download_link.setAttribute("download", "qr_code.png");
        download_link.innerText = "Download";

        download.appendChild(download_link);

        let qr_code_img = document.querySelector(".qr-code img");
        let qr_code_canvas = document.querySelector("canvas");

        if (qr_code_img.getAttribute("src") == null) {
            setTimeout(() => {
                download_link.setAttribute("href", `${qr_code_canvas.toDataURL()}`);
            }, 300);
        } else {
            setTimeout(() => {
                download_link.setAttribute("href", `${qr_code_img.getAttribute("src")}`);
            }, 300);
        }
    }

</script>
