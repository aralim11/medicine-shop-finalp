

@if(!empty($quantity))

  @foreach($quantity as $key => $value)

    <option value="{{ $key }}">{{ $value }}</option>

  @endforeach

@endif

