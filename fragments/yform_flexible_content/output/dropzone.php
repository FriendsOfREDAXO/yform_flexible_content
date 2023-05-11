<div x-data="{dragging: false, over: false, hidden:false}"
     class="relative"
     :class="{
        'pointer-events-none': hidden,
     }"
     @startdragging.window="
     dragging = true;
     $event.detail.groupIndex === groupIndex ? hidden = true : hidden = false"
     @enddragging.window="
     dragging = false;
     over = false;
     hidden = false">

    <div @dragenter="over=true"
         @dragleave="over=false"
         @dragover.prevent.stop="$event.dataTransfer.dropEffect = 'move'"
         @drop="console.log($event)"
         class="py-0.5"
         :class="{
            'scale-y-[30]': dragging,
            'cursor-pointer': dragging,
         }">
    </div>

    <div class="absolute w-0 left-1/2 -translate-x-1/2 top-1/2 -translate-y-1/2 bg-[#5bb585] h-[2px] transition-all duration-400 pointer-events-none"
         :class="{
            'w-full': over
         }">
    </div>
</div>

