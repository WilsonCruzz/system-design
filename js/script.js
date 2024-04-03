(function() {
    function TableSort(element, options) {
        // Verify if the element is a table
        if (element.tagName !== "TABLE") {
            throw new Error("Element must be a table");
        }
        // Initialize tablesort
        this.init(element, options || {});
    }

    TableSort.prototype = {
        // Initialization function
        init: function(element, options) {
            // Implementation details
        }
    };

    // Initialize tablesort
    new TableSort(document.getElementById('standing'));
})();
