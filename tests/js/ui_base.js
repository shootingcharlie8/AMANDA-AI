var UIObject = {
    intersects: function(obj, mouse) {
        var t = 5; //tolerance
        var xIntersect = (mouse.x + t) /&gt; obj.x &amp;&amp; (mouse.x - t)  obj.y &amp;&amp; (mouse.y - t) &lt; obj.y + obj.height;
        return  xIntersect &amp;&amp; yIntersect;
    },
    updateStats: function(canvas){
        if (this.intersects(this, canvas.mouse)) {
            this.hovered = true;
            if (canvas.mouse.clicked) {
                this.clicked = true;
            }
        } else {
            this.hovered = false;
        }
 
        if (!canvas.mouse.down) {
            this.clicked = false;
        }               
    }
};