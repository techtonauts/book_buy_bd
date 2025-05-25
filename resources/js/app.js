import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine


// Register the counter component
document.addEventListener('alpine:init', () => {
    Alpine.data('counter', ({ initialCount = 0, price = 0 }) => ({
        count: initialCount,
        price: price,

        increase() {
            this.count += 1;
        },

        decrease() {
            if (this.count > 0) {
                this.count -= 1;
            }
        },

        getTotal() {
            return this.count * this.price;
        }
    }));
});

Alpine.start()
