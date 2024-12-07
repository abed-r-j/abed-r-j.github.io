import streamlit as st
from diffusers import StableDiffusionXLPipeline
import torch

# Must be the first Streamlit command
st.set_page_config(page_title="SDXL Text to Image AI")

st.title("SDXL 1.0 Image Generator")

# Add GPU info display
if torch.cuda.is_available():
    gpu_info = f"Using GPU: {torch.cuda.get_device_name(0)} ({torch.cuda.get_device_properties(0).total_memory / 1024**3:.2f}GB)"
    st.sidebar.success(gpu_info)
else:
    st.sidebar.error("No GPU detected - running on CPU")

@st.cache_resource
def load_model():
    model_id = "stabilityai/stable-diffusion-xl-base-1.0"
    pipe = StableDiffusionXLPipeline.from_pretrained(
        model_id,
        torch_dtype=torch.float16,
        use_safetensors=True
    )
    if torch.cuda.is_available():
        pipe = pipe.to("cuda")
        st.sidebar.info("Model loaded on GPU")
    else:
        st.sidebar.warning("Model running on CPU (slow)")
    return pipe

# Load model
pipe = load_model()

# User interface
prompt = st.text_input("Enter your image description:")
negative_prompt = st.text_input("Enter negative prompt (what to avoid):", 
                              "blurry, bad quality, distorted")

col1, col2 = st.columns(2)
with col1:
    width = st.select_slider("Width", options=[512, 768, 1024], value=1024)
with col2:
    height = st.select_slider("Height", options=[512, 768, 1024], value=1024)

num_steps = st.slider("Number of steps", min_value=20, max_value=50, value=30)
guidance_scale = st.slider("Guidance scale", min_value=1.0, max_value=20.0, value=7.5)
generate_button = st.button("Generate Image")

if prompt and generate_button:
    with st.spinner("Generating image..."):
        # Generate image
        image = pipe(
            prompt=prompt,
            negative_prompt=negative_prompt,
            num_inference_steps=num_steps,
            guidance_scale=guidance_scale,
            width=width,
            height=height
        ).images[0]
        # Display image
        st.image(image)