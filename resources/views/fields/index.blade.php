@extends('layouts.main')

@section('content')

<div class="flex items-center justify-between mb-3">
  <h1 class="text-gray-700 text-2xl py-4" >{{ $list->name }}</h1>
  <a href="{{ route('contacts.create', $list->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-center" >Add contact</a>
</div>


<div class="border border-l-0 border-t-0 border-r-0 mb-5 pb-1" >
	<a href="#" class="pr-6" >Contacts</a>
	<a href="{{ route('fields.index', $list->id) }}" class="pr-6" >Fields</a>
	<a href="#">Settings</a>
</div>


		<ul>
            @foreach($list->fields as $field)
				<li> {{ $field->name }} </li>
				<form action="{{ route('fields.delete', [ $field->id, $field->id ] ) }}" method="POST" >
				<input type="hidden" name="_method" value="DELETE">
					@csrf
				<input type="submit" value="Delete" class="bg-red-600 py-2 px-4 rounded" >
				</form>
            @endforeach
		</ul>
		
		<a href="{{ route('fields.create', $list->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-center" >Create new field</a>
@endsection