@extends('layouts.app')

@section('content')




    <script>
        $(document).ready(function() {
            var myHeaders = new Headers();
            myHeaders.append("x-access-token", "goldapi-4j1j3sksgsa5j8-io");
            myHeaders.append("Content-Type", "application/json");

            var requestOptions = {
                method: 'GET',
                headers: myHeaders,
                redirect: 'follow'
            };
            var rate;
            fetch(`http://www.floatrates.com/daily/usd.json`)
                .then(response => response.json())
                .then(data => {
                    rate = "" + data.mxn.rate;
                }).catch(err => {
                    if (err) {
                        swal("Oh noes!", err, "error");
                    } else {
                        swal.stopLoading();
                        swal.close();
                    }
                })
                .then(fetch(`https://www.goldapi.io/api/XAU/USD`, requestOptions)
                    .then(response => response.json())
                    .then(data => {
                        const rateo = "" + data.price;
                        swal({
                            title: "Precios",
                            text: "El oro esta a " + rateo + " y el dolar a " + rate,
                            icon: "{{ url('../favicon.svg') }}",
                        });
                    })).catch(err => {
                    if (err) {
                        swal("Oh noes!", err, "error");
                    } else {
                        swal.stopLoading();
                        swal.close();
                    }
                });





        });
    </script>
@endsection
