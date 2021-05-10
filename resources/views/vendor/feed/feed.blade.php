<?php
    /* Using an echo tag here so the `<? ... ?>` won't get parsed as short tags */
/*
<?xml version="1.0"?>
<rss xmlns:g="http://base.google.com/ns/1.0" version="2.0">
    <channel>
        <title>Test Store</title>
        <link>http://www.example.com</link>
        <description>An example item from the feed</description>

        <item>
            <g:id>DB_1</g:id>
            <g:title>Dog Bowl In Blue</g:title>
            <g:description>Solid plastic Dog Bowl in marine blue color</g:description>
            <g:link>http://www.example.com/bowls/db-1.html</g:link>
            <g:image_link>http://images.example.com/DB_1.png</g:image_link>
            <g:brand>Example</g:brand>
            <g:condition>new</g:condition>
            <g:availability>in stock</g:availability>
            <g:price>9.99 GBP</g:price>
            <g:shipping>
                <g:country>UK</g:country>
                <g:service>Standard</g:service>
                <g:price>4.95 GBP</g:price>
            </g:shipping>

            <g:google_product_category>Animals &gt; Pet Supplies</g:google_product_category>
        </item>
    </channel>
</rss>
*/
    echo '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
?>
<rss xmlns:g="http://base.google.com/ns/1.0" version="2.0">
    <channel>
        @foreach($meta as $key => $metaItem)
            @if($key === 'link')
                <{{ $key }} href="{{ url($metaItem) }}"></{{ $key }}>
            @elseif($key === 'title')
                <{{ $key }}><![CDATA[{{ $metaItem }}]]></{{ $key }}>
            @else
                <{{ $key }}>{{ $metaItem }}</{{ $key }}>
            @endif
        @endforeach
        @foreach($items as $item)
            <item>
                <g:id>{{ $item->id }}</g:id>
                <g:title><![CDATA[{{ $item->title }}]]></g:title>
                <g:link>{{ lurl($item->link) }}</g:link>
                <g:category>{{ $item->category }}</g:category>
                <g:image_link>{{ $item->enclosure }}</g:image_link>
                <g:price>{{ $item->price }}</g:price>
                <g:sale_price>{{ $item->salePrice}}</g:sale_price>
                <g:availability>in stock</g:availability>
                <g:shipping_label>{{ trans('checkout.dhl_delivery') }}</g:shipping_label>
                <g:condition>new</g:condition>
                <g:description>
                    <![CDATA[{!! $item->summary !!}]]>
                </g:description>
                <g:short_description>
                    <![CDATA[{!! $item->title !!}]]>
                </g:short_description>
            </item>
        @endforeach
    </channel>
</rss>