import * as THREE from '../three/build/three.module.js';
import { GLTFLoader } from '../three/examples/jsm/loaders/GLTFLoader.js';

let scene, renderer;
let geometry, material, mesh;
var mixer;
var clock;
var camera;

init();
animate();

function init() {
	//Scene
	scene = new THREE.Scene();
	clock = new THREE.Clock();
	
	//Blender Model
	const loader = new GLTFLoader();
	loader.load( './blender_files/models.glb', function ( gltf ) {
		mesh = gltf.scene;
		mesh.traverse((object) => { if (object.isCamera) camera = object;});
		
		//animations
		mixer = new THREE.AnimationMixer(gltf);
		var clips = gltf.animations;
		
		clips.forEach( function ( clip ) {
			mixer.clipAction( clip ).play();
		} );
	
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