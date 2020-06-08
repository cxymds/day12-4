export default class {
	constructor(color){
		this.color = color;
	}
	
	init(){
		document.body.style.backgroundColor = this.color;
	}	
}