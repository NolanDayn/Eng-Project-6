import * as THREE from '../three/build/three.module.js';
import { GLTFLoader } from '../three/examples/jsm/loaders/GLTFLoader.js';

let camera, scene, renderer;
let geometry, material, mesh;

init();

function init() {
	//Camera
	camera = new THREE.PerspectiveCamera( 70, window.innerWidth / window.innerHeight, 0.01, 10 );
	camera.position.z = 5;
	
	//Scene
	scene = new THREE.Scene();
	
	const light = new THREE.AmbientLight( 0x404040 ); // soft white light
	scene.add( light );

	//Blender Model
	const loader = new GLTFLoader();
	loader.load( './blender_files/models.glb', function ( gltf ) {
	mesh = gltf.scene;
	scene.add( mesh );
	}, undefined, function ( error ) {
		console.error( error );
	} );

	renderer = new THREE.WebGLRenderer( { canvas: document.getElementById('threeCanvas') } );
	renderer.setSize( window.innerWidth, window.innerHeight );
	renderer.setAnimationLoop( animation );
	document.getElementById('threeContainer').appendChild( renderer.domElement );

}

function animation( time ) {

	if (mesh) mesh.rotation.x = time / 2000;
	if (mesh) mesh.rotation.y = time / 1000;

	renderer.render( scene, camera );

}