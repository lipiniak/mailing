@extends('layouts.app')

@section('content')

<a href="{{ route('mails.index')}}" class="btn btn-primary">Powrót</a>


<form action="{{ route('mails.store') }}" method="POST">
  @csrf
  <div class="form-group">
    <label for="for">Do kogo</label>
    <input type="text" class="form-control" id="for" placeholder="Do kogo" name="for" readonly value="{{$mail->for}}">
  </div>
   <div class="form-group">
    <label for="title">Tytuł</label>
    <input type="text" class="form-control" id="title" placeholder="Tytuł" name='title' readonly value="{{$mail->title}}">
  </div>
   <div class="form-group">
    <label for="title">Treść</label>
    <textarea id="content" name="content" readonly>{{$mail->content}}</textarea>
  </div>
</form>

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script type="text/javascript">
            tinymce.init({
            selector: 'textarea',
            readonly : 1,
            height: 300,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount', 'image'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_css: '//www.tiny.cloud/css/codepen.min.css'
        });
    </script>

@endsection