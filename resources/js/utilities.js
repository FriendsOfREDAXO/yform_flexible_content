document.addEventListener('alpine:init', () => {
  Alpine.directive('attribute', (el, { value, expression }, { evaluate, cleanup }) => {
    let prev = el.classList.contains(value);

    const handler = (mutationList) => {
      mutationList.forEach(mutation => {
        if (mutation.type === 'attributes' && mutation.attributeName === value) {
          evaluate(expression);
        }
      });
    };

    const observer = new MutationObserver(handler);
    observer.observe(el, { attributes: true });

    cleanup(() => observer.disconnect());
  });
});
