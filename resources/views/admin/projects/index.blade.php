@extends('layouts.admin')

@section('content')

<h2>projects </h2>

@if ($errors->any())
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $error )
        <li>
            {{$error}}
        </li>

        @endforeach
    </ul>
  </div>

@endif

@if (session('error'))
<div class="alert alert-danger" role="alert">
    {{session('error')}}
  </div>

@endif
@if (session('success'))
<div class="alert alert-success" role="alert">
    {{session('success')}}
  </div>


@endif

<div class="my-4 ">

    <form action="{{route('admin.project.store')}}" method="POST" class=" d-flex ">
        @csrf
        <input class="form-controll me-2 " type="search" placeholder="nuova categoria" name="title">
        <button class="btn btn-outline-success" type="submit" > invia</button>


    </form>
</div>

<table class="table crud-table">
    <thead>
      <tr>

        <th scope="col">project</th>
        <th scope="col">azioni</th>

      </tr>
    </thead>
    <tbody>
        @foreach ($projects as  $project )
        <tr>
          <td>
            <form action=" {{route('admin.project.update', $project)}} " method="POST" id="form-edit-{{ $project->id}}">
                @csrf
                @method('PUT')
                <input type="text" value="{{ $project->title}}">

            </form>
          </td>
          <td>
            <button class="btn btn-warning " onclick="submitForm({{$project->id}})"><i class="fa-solid fa-pencil"></i></button>
            <button class="btn btn-danger "><i class="fa-solid fa-trash"></i></button>

          </td>
        </tr>

        @endforeach

    </tbody>
  </table>
  <script>
    function submitForm(id){
        const form= document.getElementById('form-edit-${id}')
        form.submit();
    }
  </script>
@endsection
