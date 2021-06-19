@extends('layouts.hello')
<style>
  th {
    background-color: black;
    color: white;
    padding: 5px 30px;
  }

  td {
    border: 1px solid black;
    padding: 5px 30px;
    text-align: center;
  }

  button {
    padding: 10px 20px;
    background: black;
    color: white;
  }
</style>
@section('title', 'share.add.blade.php')


@section('content')
@if (count($errors) > 0)
<ul>
  @foreach ($errors->all() as $error)
  <li>
    {{$error}}
  </li>
  @endforeach
</ul>
@endif
<form action="/share/add" method="post">
  <table>
    @csrf
    <tr>
      <th>person_id:</th>
      <td><input type="number" name="person_id"></td>
    </tr>
    <tr>
      <th>share</th>
      <td><input type="text" name="share"></td>
    </tr>
  </table>
  <button>送信</button>
</form>
@endsection