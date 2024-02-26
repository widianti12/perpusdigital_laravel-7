<!DOCTYPE html>
<html lang="en">
@include('template.head')

<body>
    <!-- SIDEBAR -->
    @include('template.sidebar')
    <!-- END SIDEBAR -->
    <!-- NAVBAR -->
    @include('template.navbar')
    <!-- END NAVBAR -->

    <!-- MAIN CONTENT -->
    @include('template.content_2')
    <h2>Review Buku {{ $buku->judul }}</h2>

@if (session('success'))
<div class="alert alert-success alert-dismissible" role="alert" id="notification">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
    <form action="{{ route('ulasan.store') }}" method="POST">
        @csrf
        <input type="hidden" name="BukuID" value="{{ $buku->id }}">
        <label for="ulasan">Komentar:</label>
        <textarea name="ulasan" id="ulasan" required></textarea>
        <label for="rating">Rating:</label>

        <div class="star-rating">
            <input type="radio" id="rating5" name="rating" value="5"><label for="rating5"></label>
            <input type="radio" id="rating4" name="rating" value="4"><label for="rating4"></label>
            <input type="radio" id="rating3" name="rating" value="3"><label for="rating3"></label>
            <input type="radio" id="rating2" name="rating" value="2"><label for="rating2"></label>
            <input type="radio" id="rating1" name="rating" value="1"><label for="rating1"></label>
        </div>
        <button type="submit">Tambah Review</button>
    </form>

    <!-- Ulasan berdasarkan buku id -->
    @foreach($ulasan as $ub)
    <div>
        <label for="text">Rating Buku: {{ $ub->rating}}</label>
    </div>
    <div>
        <label for="text">Komentar: {{ $ub->ulasan}}</label>
    </div>
    @endforeach
    <!-- END MAIN -->

    <!-- FOOTER -->
    <style>
        .star-rating input[type="radio"] {
            display: none;
        }

        .star-rating label {
            font-size: 30px;
            color: #ccc;
            cursor: pointer;
            margin-right: 5px;
        }

        .star-rating label:before {
            content: '\2605'; /* Unicode character for star */
        }

        .star-rating input[type="radio"]:checked~label {
            color: #ffcc00; /* Change color of stars when checked */
        }
    </style>
    <!-- END FOOTER -->

    @include('template.script')
</body>

</html>
