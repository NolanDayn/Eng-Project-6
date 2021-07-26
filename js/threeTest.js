import * as THREE from '../three/build/three.module.js';
import { GLTFLoader } from '../three/examples/jsm/loaders/GLTFLoader.js';

let camera, scene, renderer;
let geometry, material, mesh;

init();

function init() {

	camera = new THREE.PerspectiveCamera( 70, window.innerWidth / window.innerHeight, 0.01, 10 );
	camera.position.z = 1;

	scene = new THREE.Scene();

	const loader = new THREE.GLTFLoader();
	loader.load( '../blender_files/models.glb', function ( gltf ) {
	mesh = gltf.scene;
	scene.add( model );
	}, undefined, function ( error ) {
		console.error( error );
	} );

	renderer = new THREE.WebGLRenderer( { canvas: document.getElementById('threeCanvas') } );
	renderer.setSize( window.innerWidth, window.innerHeight );
	renderer.setAnimationLoop( animation );
	document.getElementById('threeContainer').appendChild( renderer.domElement );

}

function animation( time ) {

	mesh.rotation.x = time / 2000;
	mesh.rotation.y = time / 1000;

	renderer.render( scene, camera );

}