/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/views/**/*.blade.php',
    './resources/js/**/*.js',
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          50: '#EDFCF4', 100: '#D4F5E4', 200: '#A8EAC9', 300: '#6DD8A4',
          400: '#34C27D', 500: '#13A862', 600: '#007A5E', 700: '#006344',
          800: '#004F36', 900: '#003F2C', 950: '#002B1E',
        },
        accent: {
          50: '#FFFAF0', 100: '#FFF0D6', 200: '#FFDFA3', 300: '#FFC86A',
          400: '#FAB240', 500: '#D4A030', 600: '#B38426', 700: '#8F6920',
          800: '#6F521C', 900: '#5A4218', 950: '#33240D',
        },
        fire: {
          50: '#FEF7F2', 100: '#FEE9DA', 200: '#FCCFAF', 300: '#F9A97A',
          400: '#F5824D', 500: '#E85D4A', 600: '#D13D34', 700: '#AE2D2A',
          800: '#8A2627', 900: '#702224', 950: '#3D0D10',
        },
        ink: {
          50: '#F8F7F6', 100: '#EBE9E5', 200: '#D7D3CC', 300: '#B9B3A8',
          400: '#9A9284', 500: '#7D7568', 600: '#655E54', 700: '#514B43',
          800: '#423D37', 900: '#2C2925', 950: '#1A1815',
        },
        surface: {
          50: '#F8F9FA', 100: '#F1F3F5', 200: '#E9ECEF', 300: '#DEE2E6',
          400: '#ADB5BD', 500: '#868E96', 600: '#495057', 700: '#343A40',
          800: '#212529', 900: '#16191C', 950: '#0D0F12',
        },
      },
      fontFamily: {
        sans: ['Inter', 'system-ui', '-apple-system', 'sans-serif'],
        display: ['Playfair Display', 'Georgia', 'serif'],
        heading: ['Sora', 'system-ui', 'sans-serif'],
      },
      fontSize: {
        'xs': ['0.6875rem', { lineHeight: '1rem', letterSpacing: '0.08em' }],
        'sm': ['0.8125rem', { lineHeight: '1.375rem', letterSpacing: '0.01em' }],
        'base': ['0.9375rem', { lineHeight: '1.75rem', letterSpacing: '0.005em' }],
        'lg': ['1.0625rem', { lineHeight: '1.75rem', letterSpacing: '0.005em' }],
        'xl': ['1.25rem', { lineHeight: '1.75rem', letterSpacing: '-0.01em' }],
        '2xl': ['1.5rem', { lineHeight: '1.9rem', letterSpacing: '-0.015em' }],
        '3xl': ['1.875rem', { lineHeight: '2.375rem', letterSpacing: '-0.02em' }],
        '4xl': ['2.375rem', { lineHeight: '2.75rem', letterSpacing: '-0.025em' }],
        '5xl': ['3rem', { lineHeight: '3.5rem', letterSpacing: '-0.03em' }],
        '6xl': ['3.75rem', { lineHeight: '4.125rem', letterSpacing: '-0.035em' }],
        '7xl': ['4.75rem', { lineHeight: '5rem', letterSpacing: '-0.04em' }],
        '8xl': ['6rem', { lineHeight: '6.25rem', letterSpacing: '-0.045em' }],
        '9xl': ['7.5rem', { lineHeight: '7.75rem', letterSpacing: '-0.05em' }],
      },
      borderRadius: {
        'xs': '0.375rem', 'sm': '0.5rem', 'DEFAULT': '0.75rem',
        'md': '1rem', 'lg': '1.25rem', 'xl': '1.5rem', '2xl': '2rem',
        '3xl': '2.5rem', 'full': '9999px',
      },
      boxShadow: {
        'xs': '0 1px 2px rgba(0,0,0,0.04)',
        'sm': '0 1px 3px rgba(0,0,0,0.04), 0 1px 2px rgba(0,0,0,0.02)',
        'DEFAULT': '0 2px 8px rgba(0,0,0,0.04), 0 1px 2px rgba(0,0,0,0.02)',
        'md': '0 4px 16px rgba(0,0,0,0.04), 0 2px 4px rgba(0,0,0,0.02)',
        'lg': '0 8px 32px rgba(0,0,0,0.05), 0 2px 8px rgba(0,0,0,0.02)',
        'xl': '0 16px 48px rgba(0,0,0,0.06), 0 4px 16px rgba(0,0,0,0.03)',
        '2xl': '0 24px 64px rgba(0,0,0,0.08), 0 8px 24px rgba(0,0,0,0.03)',
        'glow': '0 0 40px rgba(0,122,94,0.08)',
        'glow-gold': '0 0 40px rgba(212,160,48,0.08)',
        'card': '0 1px 3px rgba(0,0,0,0.02), 0 1px 2px rgba(0,0,0,0.01)',
        'inner': 'inset 0 2px 4px rgba(0,0,0,0.03)',
      },
      animation: {
        'rise': 'rise 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards',
        'slide': 'slide 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards',
        'scale': 'scale 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards',
        'fade': 'fade 0.6s ease-out forwards',
        'float': 'float 7s ease-in-out infinite',
        'pulse-soft': 'pulseSoft 3s ease-in-out infinite',
        'shimmer': 'shimmer 3s linear infinite',
        'reveal': 'reveal 1s cubic-bezier(0.16, 1, 0.3, 1) forwards',
      },
      keyframes: {
        rise: {
          from: { opacity: '0', transform: 'translateY(40px) scale(0.98)' },
          to: { opacity: '1', transform: 'translateY(0) scale(1)' },
        },
        slide: {
          from: { opacity: '0', transform: 'translateX(40px)' },
          to: { opacity: '1', transform: 'translateX(0)' },
        },
        scale: {
          from: { opacity: '0', transform: 'scale(0.9)' },
          to: { opacity: '1', transform: 'scale(1)' },
        },
        fade: {
          from: { opacity: '0' },
          to: { opacity: '1' },
        },
        float: {
          '0%, 100%': { transform: 'translateY(0)' },
          '50%': { transform: 'translateY(-16px)' },
        },
        pulseSoft: {
          '0%, 100%': { opacity: '1' },
          '50%': { opacity: '0.6' },
        },
        shimmer: {
          from: { backgroundPosition: '200% 0' },
          to: { backgroundPosition: '-200% 0' },
        },
        reveal: {
          from: { opacity: '0', transform: 'translateY(30px) scale(0.99)' },
          to: { opacity: '1', transform: 'translateY(0) scale(1)' },
        },
      },
      backgroundImage: {
        'gradient-hero': 'linear-gradient(160deg, #002B1E 0%, #004F36 30%, #007A5E 60%, #006344 100%)',
        'gradient-dark': 'linear-gradient(180deg, #1A1815 0%, #2C2925 100%)',
        'gradient-gold': 'linear-gradient(135deg, #D4A030, #FAB240)',
        'gradient-green': 'linear-gradient(135deg, #007A5E, #13A862)',
        'gradient-fire': 'linear-gradient(135deg, #E85D4A, #D13D34)',
        'noise': "url(\"data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)'/%3E%3C/svg%3E\")",
      },
    },
  },
  plugins: [],
};
