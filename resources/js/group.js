window.flexibleGroup = ($element) => {
    return {
        dragging: false,
        dragTarget: null,
        $ghostElement: '',
        dragStart(event) {
            this.dragging = true;

            this.$ghostElement = document.createElement('div');
            this.$ghostElement.classList.add('absolute', 'z-50', 'p-3', 'min-w-[300px]', 'bg-white', 'shadow-lg', 'panel', 'panel-edit', 'font-bold');
            this.$ghostElement.innerHTML = $element.querySelector('.group-name').textContent;

            document.getElementById('flexible-drag-ghost').appendChild(this.$ghostElement);
            event.dataTransfer.setDragImage(this.$ghostElement, 0, 0);
            event.dataTransfer.effectAllowed = 'move';
            event.dataTransfer.setData('text/plain', this.groupIndex);
        },
        dragOver(event) {
            event.preventDefault();
            event.stopPropagation();

            if (this.isSame(event.dataTransfer.getData('text/plain'))) {
                return;
            }

            event.dataTransfer.dropEffect = 'move';
            $element.classList.add('scale-105');
            return false;
        },
        dragEnter(event) {
            if (this.isSame(event.dataTransfer.getData('text/plain'))) {
                return;
            }

            this.dragTarget = event.target;
            $element.classList.add('scale-105');
        },
        dragLeave(event) {
            if (this.dragTarget === event.target) {
                event.stopPropagation();
                event.preventDefault();
                $element.classList.remove('scale-105');
            }
        },
        drop(event) {
            event.stopPropagation();
            $element.classList.remove('scale-105');
            const index = event.dataTransfer.getData('text/plain');

            if (this.isSame(index)) {
                return;
            }


            this.move(parseInt(index), this.groupIndex);

            return false;
        },
        dragEnd(event) {
            this.dragging = false;
            $element.classList.remove('scale-105');
            this.$ghostElement.remove();
        },
        parents($element, selector) {
            const parents = [];
            while (($element = $element.parentNode) && $element !== document) {
                if (!selector || $element.matches(selector)) parents.push($element);
            }
            return parents;
        },
        isSame(index) {
            return index == this.groupIndex;
        }
    }
};