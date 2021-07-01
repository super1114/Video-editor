<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
    <h1 class="text-xl font-bold text-white sm:text-1xl mb-4">Your projects</h1>
    <table class="mb-4 w-full bg-blue-200 table-auto rounded-lg">
        <thead>
            <tr class="bg-blue-600">
                <td class="border text-center px-2 py-2">No</td>
                <td class="border text-center px-2 py-2">Video</td>
                <td class="border text-center px-2 py-2">QR code</td>
                <td class="border text-center px-2 py-2">Product Status</td>
            </tr>    
        </thead>
        <tbody>
            @forelse($exported_videos as $index => $video)
            <tr data-id="{{$video->id}}">
                <td class="border text-center px-2 py-2">{{ $index+1 }}</td>
                <td class="border text-center px-2 py-2">{{$video->name}}</td>
                <td class="border text-center px-2 py-2">
                    <a href="{{$video->qrcode}}" data-fancybox class="button preview_qrcode">Preview</a>
                </td>
                <td class="border text-center px-2 py-2">
                    @if($video->order_status==1)
                            <button class="button order_btn">Order</button>
                    @else @if($video->order_status==2)
                                Order processing
                        @else 
                            @if($video->order_status==3)
                                delivering
                            @else
                                Order completed
                            @endif
                        @endif
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="border text-center px-2 py-2">
                    No exported video
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>