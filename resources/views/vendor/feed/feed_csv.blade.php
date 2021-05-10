id;title;link;category;image_link;price;availability;condition;description;short_description
@foreach($items as $item)
    {{ $item->id }};{!! $item->title !!};{!! lurl($item->link) !!};{!! $item->category !!};{{ $item->enclosure }};{{ $item->enclosureType }};in stock;new;"{!! $item->summary !!}";"{!! $item->title !!}"
@endforeach