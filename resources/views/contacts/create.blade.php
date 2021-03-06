  @extends('layouts.main')

  @section('content')

 <div class="flex items-center justify-between mb-3">
  <h1 class="text-gray-700 text-2xl py-4" ><a href="{{ route('lists.show', $list->id) }}">{{ $list->name }}</a></h1>
</div>

  <h1 class="text-gray-700 text-2xl py-4" >Add new contact</h1>

    <form action="{{ route('contacts.store', $list->id) }}" method="POST">
    @csrf

    <div class="block" >
      <label for="Email">Email</label>
      <input type="text" name='email' class="m-2 p-2 bg-gray-200 hover:bg-gray-100 hover:border-gray-900 focus:outline-none focus:bg-white focus:shadow-outline focus:border-gray-303" value="{{ old('email') }}" placeholder="Email" > 
      @if($errors->has('email'))
        <div class="bg-red-100 border-l-4 border-orange-500 text-orange-700 p-2 mx-2" role="alert">
          <p>{{ $errors->first('email') }}</p>
        </div>
      @endif
    </div>

    @foreach($list->fields as $field)
        
        <div class="block" >
          <label for="">{{ $field->name }}</label>
          <input type="text" name="fields[{{$field->id}}]" value='{{ old("fields.$field->id") }}' class="m-2 p-2 bg-gray-200 hover:bg-gray-100 hover:border-gray-900 focus:outline-none focus:bg-white focus:shadow-outline focus:border-gray-303" >
        </div>
      
    @endforeach

    <div class="block">
      <label for="">Send confirmation mail</label>
      <input type="checkbox" name="confirmation_mail" @if($list->double_opt_in) checked @endif  >
    </div>

    <input type="submit" value="Create" class="m-2 p-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-center" >

    </form>

  @endsection