<!DOCTYPE html>
<html>
<head>
    <title>Peta Lokasi Duduk Bioskop</title>
    <style>
        #seat-map {
            display: flex;
            flex-wrap: wrap;
            max-width: 500px;
        }
        .seat {
            width: 50px;
            height: 50px;
            border: 1px solid #ccc;
            margin: 5px;
            text-align: center;
            line-height: 50px;
            cursor: pointer;
        }
        .occupied {
            background-color: red;
            color: white;
            cursor: not-allowed;
        }
        .selected {
            background-color: green;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Peta Lokasi Duduk Bioskop</h1>
    <div id="seat-map">
        <!-- Tempat duduk akan ditambahkan secara dinamis menggunakan JavaScript -->
    </div>
    <h2>Tempat Duduk Terpilih: <span id="selected-seat"></span></h2>

    <script>
        // Ukuran peta lokasi duduk
        var rows = 10;
        var cols = 10;

        // Daftar status duduk (tersedia atau terisi)
        var seatStatus = Array(rows * cols).fill('available');

        // Mengambil elemen div untuk tempat duduk
        var seatMap = document.getElementById('seat-map');
        // Mengambil elemen span untuk tempat duduk terpilih
        var selectedSeat = document.getElementById('selected-seat');

        // Menambahkan tempat duduk ke dalam elemen div
        for (var i = 0; i < seatStatus.length; i++) {
            var seat = document.createElement('div');
            seat.className = 'seat';
            
            // Mengatur kelas CSS berdasarkan status duduk
            if (seatStatus[i] === 'occupied') {
                seat.classList.add('occupied');
            }
            
            seat.innerText = i + 1; // Menampilkan nomor tempat duduk
            seat.addEventListener('click', function() {
                // Mengubah status duduk saat tempat duduk diklik
                var seatIndex = Array.from(seatMap.children).indexOf(this);
                if (seatStatus[seatIndex] === 'available') {
                    seatStatus[seatIndex] = 'selected';
                    this.classList.add('selected');
                    selectedSeat.innerText = seatIndex + 1;
                } else if (seatStatus[seatIndex] === 'selected') {
                    seatStatus[seatIndex] = 'available';
                    this.classList.remove('selected');
                    selectedSeat.innerText = '';
                }
            });
            
            seatMap.appendChild(seat);
        }
    </script>
</body>
</html>