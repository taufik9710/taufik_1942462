@extends('master')

<!-- memberikan judul di tab sesuai dengan judul artikel yang sedang dibaca -->
@section('title')
{{ $article->judul }}
@endsection

<!-- menampilkan gambar, judul, dan isi artikel -->
@section('main')
<div class="col-md-7 col-sm-12 mb-5 bg-white p-0">

    <img src="https://atlantictravelsusa.com/wp-content/uploads/2016/04/dummy-post-horisontal-thegem-blog-default.jpg" class="card-img-top" alt="gambar">
    <div class="p-4">
        <h6 class="mt-5">{{ $article->author }}
        {{ date('M j, Y', strtotime($article->updated_at)) }}</h6>
        <h2>{{ $article->judul }}</h2>
        <p class="mt-5">{{ $article->deskripsi }}</p>
    </div>
</div>
<div class="col-md-7 col-sm-12 mb-5 bg-white p-0">
    <hr>
    <h5>Komentar</h5>
    <div class="p-4">
        <form action="{{ url('/comment') }}" method="post">
            @csrf
            <input type="hidden" name="id" value="#" class="form-control">
            <input type="hidden" name="parent_id" id="parent_id" class="form-control">
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" class="form-control" name="username">
                <p class="text-danger">{{ $errors->first('username') }}</p>
            </div>
            <div class="form-group" style="display: none" id="formReplyComment">
                <label for="">Balas Komentar</label>
                <input type="text" id="replyComment" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">Komentar</label>
                <textarea name="comment" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <button class="btn btn-primary btn-sm">Kirim</button>
        </form>
        @endsection

        <!-- menampilkan tombol kembali ke halaman utama -->
        @section('sidebar')
        <div class="col-md-4 offset-md-1 col-sm-12 bg-white p-4 h-100">
            <center>
                <a href="/">
                    <button class="btn btn-info text-white w-100">Kembali</button>
                </a>
            </center>
        </div>
        @endsection
