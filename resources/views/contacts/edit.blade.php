@extends('layouts.main')

@section('content')

<div class="flex items-center justify-between mb-3">
<h1 class="text-gray-700 text-2xl py-4" ><a href="{{ route('lists.show', $list->id) }}">{{ $list->name }}</a></h1>
</div>


<form action="{{ route('contacts.update', [ $list->id , $contact->id ] ) }}" method="POST">
    <input type="hidden" name="_method" value="PUT">
    @csrf

    <div class="block" >
      <label for="Email">Email</label>
      <input type="text" name='email' value="{{ $contact->email }}" class="m-2 p-2 bg-gray-200 hover:bg-gray-100 hover:border-gray-900 focus:outline-none focus:bg-white focus:shadow-outline focus:border-gray-303" value="{{ old('email') }}" placeholder="Email" > 
      @if($errors->has('email'))
        <div class="bg-red-100 border-l-4 border-orange-500 text-orange-700 p-2 mx-2" role="alert">
          <p>{{ $errors->first('email') }}</p>
        </div>
      @endif
    </div>

    @foreach($list->fields as $field)

    <div class="block" >
          <label for="">{{ $field->name }}</label>
          <input type="text" name="fields[{{$field->id}}]" value='{{ $contact->getFieldValue($field->id) }}' class="m-2 p-2 bg-gray-200 hover:bg-gray-100 hover:border-gray-900 focus:outline-none focus:bg-white focus:shadow-outline focus:border-gray-303" >
        </div>
    @endforeach

    <input type="submit" value="Save" class="m-2 p-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-center" >

    </form>

@endsection