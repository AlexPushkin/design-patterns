class EventObserver {
    constructor() {
        this.observers = [];
    }

    subscribe(fn) {
        this.observers.push(fn);
    }

    unsubscribe(fn) {
        this.observers = this.observers.filter(subscriber => subscriber !== fn);
    }

    broadcast(data) {
        this.observers.forEach(subscriber => subscriber(data))
    }
}

const getWordsCount = text => text ? text.trim().split(/\s+/).length : 0;
const getSymbolsCount = text => text ? text.length : 0;

const observer = new EventObserver();
observer.subscribe(text => {
    const wordsCountElement = document.getElementById('words-count');
    wordsCountElement.textContent = getWordsCount(text);
});
observer.subscribe(text => {
    const symbolsCountElement = document.getElementById('symbols-count');
    symbolsCountElement.textContent = getSymbolsCount(text);
});

const textInput = document.getElementById('input');

textInput.addEventListener('keyup', () => {observer.broadcast(textInput.value)});