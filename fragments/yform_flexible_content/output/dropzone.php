<?php
$isLast = $this->getVar('last');
?>

<div x-data="{dragging: false, over: false, hidden:false, currentIndex:groupIndex}"
     <?php if (!$isLast): ?>
     class="relative top-2"
     <?php else: ?>
     class="relative -top-2"
     <?php endif ?>
     :class="{
        'pointer-events-none': hidden,
     }"
     @startdragging.window="
     dragging = true;
     <?php if (!$isLast): ?>
     groupIndex > $event.detail.groupIndex ? currentIndex = groupIndex - 1 : currentIndex = groupIndex;
     <?php endif ?>
     $event.detail.groupIndex === currentIndex ? hidden = true : hidden = false"
     @enddragging.window="
     dragging = false;
     over = false;
     hidden = false">

    <div @dragenter="over=true"
         @dragleave="over=false"
         @dragover.prevent.stop="$event.dataTransfer.dropEffect = 'move'"
         @drop="move($event.dataTransfer.getData('text/plain'), currentIndex)"
         class="py-0.5"
         :class="{
            'scale-y-[50]': dragging,
            'cursor-pointer': dragging,
            'bg-[fuchsia] opacity-30': debug,
         }">
    </div>

    <div class="absolute w-0 left-1/2 -translate-x-1/2 top-1/2 -translate-y-1/2 bg-[#5bb585] h-[2px] transition-all duration-400 pointer-events-none"
         :class="{
            'w-full': over
         }">
    </div>
</div>

