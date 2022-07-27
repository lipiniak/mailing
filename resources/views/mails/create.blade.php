@extends('layouts.app')

@section('content')

<a href="{{ route('mails.index')}}" class="btn btn-primary">Powrót</a>


<form action="{{ route('mails.store') }}" method="POST">
  @csrf
  <div class="form-group">
    <label for="for">Do kogo</label>
    <input type="text" class="form-control" id="for" placeholder="Do kogo" name="for" required>
  </div>
   <div class="form-group">
    <label for="title">Tytuł</label>
    <input type="text" class="form-control" id="title" placeholder="Tytuł" name='title' required>
  </div>
   <div class="form-group">
    <label for="title">Treść</label>
    <textarea id="content" name="content"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Wyślij</button>
</form>

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script type="text/javascript">
            tinymce.init({
            selector: 'textarea',
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