<option>--- Select Pstation ---</option>

@if(!empty($pstations))

  @foreach($pstations as $key => $value)

    <option value="{{ $key }}">{{ $value }}</option>

  @endforeach

@endif


