window.flexibleGroup = ($element) => {
  return {
    dragging: false,
    otherDragging: false,
    dragTarget: null,
    $ghostElement: '',
    dragStart (event) {
      this.dragging = true;

      this.$ghostElement = document.createElement('div');
      this.$ghostElement.classList.add('absolute', 'z-50', 'p-3', 'min-w-[300px]', 'bg-white', 'shadow-lg', 'panel', 'panel-edit', 'font-bold');
      this.$ghostElement.innerHTML = $element.querySelector('.group-name').textContent;

      document.getElementById('flexible-drag-ghost').appendChild(this.$ghostElement);
      event.dataTransfer.setDragImage(this.$ghostElement, 0, 0);
      event.dataTransfer.effectAllowed = 'move';
      event.dataTransfer.setData('text/plain', this.groupIndex);
    },
    dragEnd (event) {
      this.dragging = false;
      $element.classList.remove('scale-105');
      this.$ghostElement.remove();
    },
    parents ($element, selector) {
      const parents = [];
      while (($element = $element.parentNode) && $element !== document) {
        if (!selector || $element.matches(selector)) parents.push($element);
      }
      return parents;
    },
    isSame (index) {
      return index == this.groupIndex;
    }
  };
};