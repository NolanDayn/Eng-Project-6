var canvasContainer = document.getElementsByClassName("threeContainer")[0];

//scene
const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera( 75, window.innerWidth / window.innerHeight, 0.1, 1000 );

//set canvas
const renderer = new THREE.WebGLRenderer( {canvas:document.getElementById("threeCanvas")});
renderer.setSize( window.innerWidth, window.innerHeight );
canvasContainer.appendChild( renderer.domElement );

var model;
//const geometry = new THREE.BoxGeometry();
//const material = new THREE.MeshBasicMaterial( { color: 0x00ff00 } );
//const cube = new THREE.Mesh( geometry, material );
//scene.add( cube );

const loader = new THREE.GLTFLoader();

loader.load( './blender_files/models.glb', function ( gltf ) {
	model = gltf.scene;
	scene.add( model );
}, undefined, function ( error ) {
	console.error( error );
} );

camera.position.z = 5;

const animate = function () {
	requestAnimationFrame( animate );
	
	if (model) model.rotation.x += 0.01;
	if (model) model.rotation.y += 0.01;
	
	//cube.rotation.x += 0.01;
	//cube.rotation.y += 0.01;

	renderer.render( scene, camera );
};

animate();