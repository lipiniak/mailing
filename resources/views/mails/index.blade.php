@extends('layouts.app')

@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">Do kogo</th>
      <th scope="col">Tytuł</th>
      <th scope="col"><a href="{{ route('mails.create') }}" class="btn btn-primary">Dodaj</a></th>
    </tr>
  </thead>
  <tbody>
    @foreach($mails as $mail)
    <tr>
      <td>{{$mail->for}}</td>
      <td>{{$mail->title}}</td>
      <td>
        <a href="{{ route('mails.show',$mail->id) }}" class="btn btn-primary">Zobacz</a>
        <a href="#"  data-bs-toggle="modal" data-bs-target="#confirmDelete{{$mail->id}}" class="btn btn-danger">Usuń</a>
        <div class="modal fade" id="confirmDelete{{$mail->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      Usuwanie
                  </div>
                  <div class="modal-body">
                      Czy na pewno chcesz usunąć?
                  </div>
                  <div class="modal-footer">
                    <form action="{{route('mails.destroy',$mail->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button type="button" class="btn btn-default" data-dismiss="modal">Nie</button>
                      <button tyle="submit" class="btn btn-danger btn-ok">Tak</button>
                    </form>
                  </div>
              </div>
          </div>
      </div>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>


<script>
   $('#confirmDelete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
   });
</script>
@endsection