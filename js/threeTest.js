import * as THREE from '../three/build/three.module.js';
import { GLTFLoader } from '../three/examples/jsm/loaders/GLTFLoader.js';

let camera, scene, renderer;
let geometry, material, mesh;
var mixer;
var clock;

init();
animate();

function init() {
	//Camera
	camera = new THREE.PerspectiveCamera( 70, window.innerWidth / window.innerHeight, 0.01, 40 );
	camera.position.z = 6;
	
	//Scene
	scene = new THREE.Scene();
	clock = new THREE.Clock();
	
	const light = new THREE.AmbientLight( 0x404040 ); // soft white light
	scene.add( light );

	//Blender Model
	const loader = new GLTFLoader();
	loader.load( './blender_files/models.glb', function ( gltf ) {
		mesh = gltf.scene;
		
		//animation
		mixer = new THREE.AnimationMixer(mesh);
		mixer.clipAction(gltf.animations[0]).play();
	
		scene.add( mesh );
		}, undefined, function ( error ) {
			console.error( error );
		} );

	//Renderer settings
	renderer = new THREE.WebGLRenderer( { canvas: document.getElementById('threeCanvas') } );
	renderer.setSize( window.innerWidth, window.innerHeight );
	document.getElementById('threeContainer').appendChild( renderer.domElement );

}

function animate() {
  requestAnimationFrame( animate );
  var delta = clock.getDelta();
  if ( mixer ) mixer.update( delta );

  renderer.render( scene, camera );

}