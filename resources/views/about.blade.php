<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Bheramara Laravel Projects</title>
</head>
<body>
  <h1>This is about page content</h1>

  <h2>Hello, {{ $name }}.</h2>

  <h3>The current UNIX timestamp is {{ time() }}.</h3>

  <h2>Hello, {!! $name !!}.</h2>

  <h1>Laravel</h1>

  Hello, @{{ name }}.

  {{-- <script>
    var app = <?php echo json_encode($array); ?>;
  </script > --}}

  @verbatim
    <div class="container">
        Hello, {{ name }}.
    </div>
  @endverbatim

  {{-- <?php $records = array() ?> --}}
  @ $records = array();
  @if (count($records) === 1)
    I have one record!
  @elseif (count($records) > 1)
      I have multiple records!
  @else
      I don't have any records!
  @endif

</body>
</html>
