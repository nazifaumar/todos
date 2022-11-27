@extends('layout')

@section('content')
<div class="container content">  

  <form id="create-form" action="/todo/update/{{ $todo['id']}}" method="POST">
    {{--mengambil dan mengirim data input ke controller yang nantinya di ambil oleh request  $REQUEST--}}
    @csrf
    {{--karena di route nya pake method pacth sedangkan attribute method di form cuman bisa post/get. Jadi yang post nya ditimpa--}}
    @method('PATCH')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach 
        </ul>

    </div>
    @endif
    <h3>Edit Todo</h3>
    
    <fieldset>
        <label for="">Title</label>
        {{--atribute value pungsinya untuk memasukan data ke input--}}
        {{--kenapa datnya harus disimpet di input? karena kan ini fitur edit, karena fitur edit belum tentu semua data column diubah--}}
        <input placeholder="title of todo" type="text" name="title" value="{{ $todo 
        ['title']}}">
    </fieldset>
    <fieldset>
        <label for="">Target Date</label>
        <input placeholder="Target Date" type="date" name="date" value="{{ $todo 
        ['date']}}">
    </fieldset>
    <fieldset>
        <label for="">Description</label>
        {{--karnea textarea tidak termasuk tag input, untuk menampilkan value nya di pertengahan (sebelum penutup tag </textarea>)--}}
        <textarea name="description" placeholder="Type your descriptions here..." tabindex="5">{{ $todo['description']}}</textarea>
    </fieldset>
    <fieldset>
        <button name="submit" type="submit" id="contactus-submit">Submit</button>
    </fieldset>
    <fieldset>
        <a href="/todo/" class="btn-cancel btn-lg btn">Cancel</a>
    </fieldset>
  
  </form>
</div>
@endsection