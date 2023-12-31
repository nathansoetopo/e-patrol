<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Data Presensi Satpam</title>
</head>

<body>
    <div class="container-fluid">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama Satpam</th>
                    <th>Nama Titik</th>
                    <th>Deskripsi</th>
                    <th>Range</th>
                    <th>Attachment</th>
                    <th>Selfie</th>
                    <th>Status</th>
                    <th>Waktu Laporan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($satpam as $s)
                    <tr>
                        <td>
                            {{ $s->name }}
                        </td>
                        <td>
                            {{ $laporan->name }}
                        </td>
                        <td>
                            {{ $s->pivot->deskripsi }}
                        </td>
                        <td>
                            {{ $s->pivot->range }}
                        </td>
                        {{-- <td>
                        {{ $s->pivot->attachment }}
                    </td> --}}
                        {{-- <td>
                        <img src="{{ asset('data_users/' . $s->name . '/image/'.$s->image) }}" alt="satpam">
                    </td> --}}
                        <td>
                            {{ env('APP_URL') . '/data/' . $s->name . '/laporan/' . $s->pivot->attachment }}
                        </td>
                        <td>
                            {{ env('APP_URL') . '/data/' . $s->name . '/laporan/' . $s->pivot->selfie }}
                        </td>
                        <td>{{ $s->pivot->created_at }}</td>
                        <td>
                            {{ $s->status }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
        integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
