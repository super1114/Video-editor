<div class="mt-4 w-full flex justify-between items-start">
  <div x-data="range()" x-init="mintrigger(); maxtrigger()" class="relative w-full">
    <div>
      <input type="range"
             step="1"
             x-bind:min="min" x-bind:max="max"
             x-on:input="mintrigger"
             x-model="minprice"
             class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer">

      <input type="range" 
             step="1"
             x-bind:min="min" x-bind:max="max"
             x-on:input="maxtrigger"
             x-model="maxprice"
             class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer">

      <div class="relative z-10 h-2">

        <div class="absolute z-10 left-0 right-0 bottom-0 top-0 rounded-md bg-gray-200"></div>

        <div class="absolute z-20 top-0 bottom-0 rounded-md bg-green-300" x-bind:style="'right:'+maxthumb+'%; left:'+minthumb+'%'"></div>

        <div class="absolute z-30 w-6 h-6 top-0 left-0 bg-green-300 rounded-full -mt-2 -ml-1" x-bind:style="'left: '+minthumb+'%'"></div>

        <div class="absolute z-30 w-6 h-6 top-0 right-0 bg-green-300 rounded-full -mt-2 -mr-3" x-bind:style="'right: '+maxthumb+'%'"></div>
 
      </div>

    </div>
    
    <div class="flex justify-between items-center py-5">
      <div class="w-5/12 pr-6">
        <input type="text" maxlength="5" x-on:input="mintrigger" x-model="minprice" class="px-3 py-2 border border-gray-200 rounded w-full text-center">
      </div>
      <img src="{{asset($resource->thumbnail)}}" class="w-2/12 rounded-md z-0" data-id="sdf" />
      <div class="w-5/12 pl-6">
        <input type="text" maxlength="5" x-on:input="maxtrigger" x-model="maxprice" class="px-3 py-2 border border-gray-200 rounded w-full text-center">
      </div>
    </div>
  </div>
</div>
<script>
  var duration = "{{$resource->duration}}";
    function range() {
      return {
        minprice: 0, 
        maxprice: duration,
        min: 0,
        max: 100,
        minthumb: 0,
        maxthumb: 0, 
        mintrigger() {   
          this.minprice = Math.min(this.minprice, this.maxprice);      
          this.minthumb = ((this.minprice - this.min) / (this.max - this.min)) * 100;
        },
        maxtrigger() {
          this.maxprice = Math.max(this.maxprice, this.minprice); 
          this.maxthumb = 100-(((this.maxprice - this.min) / (this.max - this.min)) * 100);    
        }, 
      }
    }
</script>