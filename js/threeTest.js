import * as THREE from '../three/build/three.module.js';
import { GLTFLoader } from '../three/examples/jsm/loaders/GLTFLoader.js';

let scene, renderer;
let geometry, material, mesh;
var mixer;
var clock;
var camera;

init();

function init() {
	//Scene
	scene = new THREE.Scene();
	clock = new THREE.Clock();
	
	//lights
	const ambientLight = new THREE.AmbientLight( 0x404040, 1 ); // soft white light
	scene.add( ambientLight );
	
	const hemLight = new THREE.HemisphereLight(0xB1E1FF, 0xB97A20, 1);
	scene.add( hemLight );
	
	//Create a DirectionalLight and turn on shadows for the light
	const light = new THREE.DirectionalLight( 0xffffff, 1, 100 );
	light.position.set( 0, 1, 0 ); //default; light shining from top
	light.castShadow = true; // default false
	scene.add( light );
	
	//Blender Model
	const loader = new GLTFLoader();
	loader.load( './blender_files/models.glb', function ( gltf ) {
		mesh = gltf.scene;
		mesh.traverse((object) => { if (object.isCamera) camera = object;});
		
		//animations
		mixer = new THREE.AnimationMixer(mesh);
		mixer.timeScale = 0.4;
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

	animate();
}

function animate() {
  requestAnimationFrame( animate );
  var delta = clock.getDelta();
  if ( mixer ) mixer.update( delta );

  if (camera) renderer.render( scene, camera );

}