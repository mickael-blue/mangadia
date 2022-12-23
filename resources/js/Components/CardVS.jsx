export default function CardVS({ character, vote, className, handleClick }) {
    return (
        <div onClick={(e) => handleClick(e)} className={`relative before:transition before:content-["Vote"] before:flex before:text-5xl before:justify-center before:items-center before:text-state-900 before:duration-200 hover:before:opacity-40 before:opacity-0 before:block before:absolute before:inset-0 before:bg-slate-100 rounded-xl overflow-hidden shadow-lg bg-slate-100 mx-4`}>
            <div className="max-w-sm flex flex-col h-full">
                <img className="w-full flex-1 object-cover" src={`/storage/` + character.picture_path} alt={character.name}/>
                <div className="px-6 py-4">
                    <div className="font-bold text-xl text-center mb-2">{character.name + ' - ' + character.manga.title + ' ('+vote+')'}</div>
                </div>
            </div>
        </div>
    );
}
